<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InvitationController extends Controller
{
    /**
     * Display a listing of user's invitations.
     */
    public function index()
    {
        $invitations = Auth::user()->invitations()
            ->with('template')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('invitations.index', compact('invitations'));
    }

    /**
     * Show invitations for current user dashboard
     */
    public function myInvitations()
    {
        $invitations = Auth::user()->invitations()
            ->with('template')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.my-invitations', compact('invitations'));
    }

    /**
     * Show the form for creating a new invitation.
     */
    public function create(Request $request)
    {
        $template_id = $request->template_id;
        $template = null;

        if ($template_id) {
            $template = Template::findOrFail($template_id);
            
            // Check if user has access to this template
            if ($template->is_premium && !$this->userHasAccessToTemplate($template)) {
                return redirect()->route('templates.show', $template)
                    ->with('error', 'Anda perlu membeli template ini terlebih dahulu.');
            }
        }

        $templates = Template::active()->get();
        
        return view('invitations.create', compact('template', 'templates'));
    }

    /**
     * Store a newly created invitation.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'template_id' => 'required|exists:templates,id',
            'title' => 'required|string|max:255',
            'invitation_data' => 'required|array',
            'event_date' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $template = Template::findOrFail($request->template_id);

        // Check template access
        if ($template->is_premium && !$this->userHasAccessToTemplate($template)) {
            return back()->with('error', 'Anda tidak memiliki akses ke template ini.');
        }

        $invitation = Auth::user()->invitations()->create([
            'template_id' => $template->id,
            'title' => $request->title,
            'invitation_data' => $request->invitation_data,
            'event_date' => $request->event_date,
            'status' => 'draft',
        ]);

        return redirect()->route('invitations.edit', $invitation)
            ->with('success', 'Undangan berhasil dibuat! Silakan lengkapi detail undangan Anda.');
    }

    /**
     * Show the form for editing the invitation.
     */
    public function edit(Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        return view('invitations.edit', compact('invitation'));
    }

    /**
     * Update the invitation.
     */
    public function update(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'invitation_data' => 'required|array',
            'event_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $invitation->update($request->only(['title', 'invitation_data', 'event_date']));

        return back()->with('success', 'Undangan berhasil diperbarui.');
    }

    /**
     * Remove the invitation.
     */
    public function destroy(Invitation $invitation)
    {
        $this->authorize('delete', $invitation);

        $invitation->delete();

        return redirect()->route('invitations.index')
            ->with('success', 'Undangan berhasil dihapus.');
    }

    /**
     * Publish the invitation.
     */
    public function publish(Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $invitation->publish();

        return back()->with('success', 'Undangan berhasil dipublikasikan! URL: ' . $invitation->public_url);
    }

    /**
     * Public view via slug (path-based)
     */
    public function publicShow($slug)
    {
        $invitation = Invitation::where('slug', $slug)
            ->published()
            ->public()
            ->with(['template', 'user'])
            ->firstOrFail();

        $invitation->incrementViews();

        return view('invitations.public', compact('invitation'));
    }

    /**
     * Public view via subdomain
     */
    public function showBySubdomain(Request $request, $subdomain)
    {
        // Check if subdomain is not reserved
        $reservedSubdomains = config('app.invitation.reserved_subdomains', []);
        if (in_array($subdomain, $reservedSubdomains)) {
            abort(404);
        }

        $invitation = Invitation::where('subdomain', $subdomain)
            ->published()
            ->public()
            ->with(['template', 'user'])
            ->firstOrFail();

        $invitation->incrementViews();

        return view('invitations.public', compact('invitation'));
    }

    /**
     * Handle RSVP for path-based URL
     */
    public function rsvp(Request $request, $slug)
    {
        $invitation = Invitation::where('slug', $slug)->published()->firstOrFail();
        
        return $this->handleRsvp($request, $invitation);
    }

    /**
     * Handle RSVP for subdomain
     */
    public function rsvpBySubdomain(Request $request, $subdomain)
    {
        $invitation = Invitation::where('subdomain', $subdomain)->published()->firstOrFail();
        
        return $this->handleRsvp($request, $invitation);
    }

    /**
     * Process RSVP response
     */
    private function handleRsvp(Request $request, Invitation $invitation)
    {
        if (!$invitation->rsvp_enabled) {
            return back()->with('error', 'RSVP tidak tersedia untuk undangan ini.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'attendance' => 'required|in:attending,not_attending,maybe',
            'guest_count' => 'required|integer|min:1|max:10',
            'message' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $rsvpData = $invitation->rsvp_responses ?: [];
        $rsvpData[] = [
            'name' => $request->name,
            'attendance' => $request->attendance,
            'guest_count' => $request->guest_count,
            'message' => $request->message,
            'phone' => $request->phone,
            'submitted_at' => now()->toISOString(),
            'ip_address' => $request->ip(),
        ];

        $invitation->update(['rsvp_responses' => $rsvpData]);

        return back()->with('success', 'Terima kasih! RSVP Anda telah berhasil dikirim.');
    }

    /**
     * QR code redirect
     */
    public function qrRedirect($slug)
    {
        $invitation = Invitation::where('slug', $slug)->published()->firstOrFail();
        
        return redirect($invitation->public_url);
    }

    /*
    |--------------------------------------------------------------------------
    | Domain Management Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Enable subdomain for invitation
     */
    public function enableSubdomain(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        if (!config('app.invitation.enable_subdomains')) {
            return back()->with('error', 'Fitur subdomain tidak tersedia.');
        }

        // Check if user can create more subdomains
        if (!$this->canUserCreateSubdomain()) {
            return back()->with('error', 'Anda telah mencapai batas maksimal subdomain.');
        }

        $customSubdomain = $request->subdomain;

        if ($invitation->enableSubdomain($customSubdomain)) {
            return back()->with('success', 'Subdomain berhasil diaktifkan: ' . $invitation->subdomain_url);
        }

        return back()->with('error', 'Subdomain tidak tersedia atau sudah digunakan.');
    }

    /**
     * Disable subdomain
     */
    public function disableSubdomain(Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $invitation->update([
            'subdomain' => null,
            'domain_type' => Invitation::DOMAIN_TYPE_PATH
        ]);

        return back()->with('success', 'Subdomain berhasil dinonaktifkan.');
    }

    /**
     * Set custom domain
     */
    public function setCustomDomain(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        if (!config('app.invitation.enable_custom_domains')) {
            return back()->with('error', 'Fitur custom domain tidak tersedia.');
        }

        if (config('app.invitation.custom_domain_premium_only') && !Auth::user()->isPremium()) {
            return back()->with('error', 'Custom domain hanya tersedia untuk member premium.');
        }

        $validator = Validator::make($request->all(), [
            'custom_domain' => 'required|string|max:255|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]?\.[a-zA-Z]{2,}$/',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if ($invitation->enableCustomDomain($request->custom_domain)) {
            return back()->with('success', 'Custom domain berhasil diatur: ' . $invitation->custom_domain_url);
        }

        return back()->with('error', 'Domain tidak valid atau sudah digunakan.');
    }

    /**
     * Remove custom domain
     */
    public function removeCustomDomain(Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $invitation->disableCustomDomain();

        return back()->with('success', 'Custom domain berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate subdomain availability
     */
    public function validateSubdomain(Request $request)
    {
        $subdomain = $request->subdomain;
        $invitationId = $request->invitation_id;

        // Check if subdomain is reserved
        $reservedSubdomains = config('app.invitation.reserved_subdomains', []);
        if (in_array($subdomain, $reservedSubdomains)) {
            return response()->json(['available' => false, 'message' => 'Subdomain ini sudah direservasi sistem.']);
        }

        // Check if subdomain is already taken
        $exists = Invitation::where('subdomain', $subdomain)
            ->when($invitationId, function ($query, $invitationId) {
                return $query->where('id', '!=', $invitationId);
            })
            ->exists();

        if ($exists) {
            return response()->json(['available' => false, 'message' => 'Subdomain sudah digunakan.']);
        }

        return response()->json(['available' => true, 'message' => 'Subdomain tersedia.']);
    }

    /**
     * Validate custom domain
     */
    public function validateCustomDomain(Request $request)
    {
        $domain = $request->domain;

        // Basic domain validation
        if (!filter_var('http://' . $domain, FILTER_VALIDATE_URL)) {
            return response()->json(['valid' => false, 'message' => 'Format domain tidak valid.']);
        }

        // Check if domain is already used
        $exists = Invitation::where('custom_domain', $domain)->exists();
        if ($exists) {
            return response()->json(['valid' => false, 'message' => 'Domain sudah digunakan.']);
        }

        return response()->json(['valid' => true, 'message' => 'Domain valid dan tersedia.']);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Check if user has access to premium template
     */
    private function userHasAccessToTemplate(Template $template)
    {
        if (!$template->is_premium) {
            return true;
        }

        // Check if user is premium
        if (Auth::user()->isPremium()) {
            return true;
        }

        // Check if user has purchased this template
        return Auth::user()->orders()
            ->where('template_id', $template->id)
            ->where('status', 'paid')
            ->exists();
    }

    /**
     * Check if user can create more subdomains
     */
    private function canUserCreateSubdomain()
    {
        $maxSubdomains = config('app.invitation.max_subdomains_per_user', 5);
        
        if (Auth::user()->isPremium()) {
            return true; // Premium users have unlimited subdomains
        }

        $currentCount = Auth::user()->invitations()
            ->whereNotNull('subdomain')
            ->count();

        return $currentCount < $maxSubdomains;
    }

    /**
     * Get invitation analytics
     */
    public function analytics(Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        $analytics = [
            'total_views' => $invitation->views_count,
            'rsvp_count' => count($invitation->rsvp_responses ?: []),
            'rsvp_attending' => count(array_filter($invitation->rsvp_responses ?: [], function($rsvp) {
                return $rsvp['attendance'] === 'attending';
            })),
            'domain_type' => $invitation->domain_type,
            'public_url' => $invitation->public_url,
        ];

        return response()->json($analytics);
    }
}