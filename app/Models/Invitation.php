<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template_id',
        'title',
        'slug',
        'invitation_data',
        'custom_styles',
        'custom_domain',
        'subdomain',
        'domain_type',
        'rsvp_responses',
        'guest_list',
        'is_public',
        'rsvp_enabled',
        'guest_book_enabled',
        'music_enabled',
        'background_music',
        'gallery_images',
        'love_story',
        'event_details',
        'views_count',
        'status',
        'published_at',
        'event_date',
    ];

    protected $casts = [
        'invitation_data' => 'array',
        'custom_styles' => 'array',
        'rsvp_responses' => 'array',
        'guest_list' => 'array',
        'gallery_images' => 'array',
        'event_details' => 'array',
        'is_public' => 'boolean',
        'rsvp_enabled' => 'boolean',
        'guest_book_enabled' => 'boolean',
        'music_enabled' => 'boolean',
        'published_at' => 'datetime',
        'event_date' => 'datetime',
    ];

    // Domain Types
    const DOMAIN_TYPE_PATH = 'path';           // /invitation/slug
    const DOMAIN_TYPE_SUBDOMAIN = 'subdomain'; // slug.undanganonline.com
    const DOMAIN_TYPE_CUSTOM = 'custom';       // custom.com

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    // Scopes
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Domain Management Methods
    public function getPublicUrlAttribute()
    {
        switch ($this->domain_type) {
            case self::DOMAIN_TYPE_CUSTOM:
                return $this->custom_domain ? 'https://' . $this->custom_domain : $this->getPathUrl();
                
            case self::DOMAIN_TYPE_SUBDOMAIN:
                return $this->subdomain ? 
                    'https://' . $this->subdomain . '.' . config('app.domain', 'undanganonline.com') : 
                    $this->getPathUrl();
                    
            case self::DOMAIN_TYPE_PATH:
            default:
                return $this->getPathUrl();
        }
    }

    private function getPathUrl()
    {
        return route('invitation.show', $this->slug);
    }

    public function getSubdomainUrlAttribute()
    {
        if (!$this->subdomain) {
            return null;
        }
        return 'https://' . $this->subdomain . '.' . config('app.domain', 'undanganonline.com');
    }

    public function getCustomDomainUrlAttribute()
    {
        if (!$this->custom_domain) {
            return null;
        }
        return 'https://' . $this->custom_domain;
    }

    // Status Methods
    public function isPublished()
    {
        return $this->status === 'published';
    }

    public function isDraft()
    {
        return $this->status === 'draft';
    }

    public function publish()
    {
        $this->update([
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    // Domain Type Methods
    public function setDomainType($type)
    {
        $this->domain_type = $type;
        $this->save();
    }

    public function enableSubdomain($subdomain = null)
    {
        $subdomain = $subdomain ?: $this->generateSubdomain();
        
        if ($this->isSubdomainAvailable($subdomain)) {
            $this->update([
                'subdomain' => $subdomain,
                'domain_type' => self::DOMAIN_TYPE_SUBDOMAIN
            ]);
            return true;
        }
        
        return false;
    }

    public function enableCustomDomain($domain)
    {
        // Validate domain format
        if (!$this->isValidDomain($domain)) {
            return false;
        }

        $this->update([
            'custom_domain' => $domain,
            'domain_type' => self::DOMAIN_TYPE_CUSTOM
        ]);
        
        return true;
    }

    public function disableCustomDomain()
    {
        $this->update([
            'custom_domain' => null,
            'domain_type' => $this->subdomain ? self::DOMAIN_TYPE_SUBDOMAIN : self::DOMAIN_TYPE_PATH
        ]);
    }

    // Helper Methods
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function generateUniqueSlug()
    {
        $slug = Str::slug($this->title);
        $count = 1;
        
        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = Str::slug($this->title) . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function generateSubdomain()
    {
        // Generate subdomain from invitation data
        $data = $this->invitation_data;
        
        if (isset($data['bride_name']) && isset($data['groom_name'])) {
            // Wedding invitation
            $subdomain = Str::slug($data['bride_name'] . '-' . $data['groom_name']);
        } elseif (isset($data['name'])) {
            // Birthday or other single-person event
            $subdomain = Str::slug($data['name'] . '-' . $this->template->category);
        } else {
            // Fallback to slug
            $subdomain = $this->slug;
        }

        // Ensure subdomain is unique
        $count = 1;
        $originalSubdomain = $subdomain;
        
        while (static::where('subdomain', $subdomain)->where('id', '!=', $this->id ?? 0)->exists()) {
            $subdomain = $originalSubdomain . '-' . $count;
            $count++;
        }

        return $subdomain;
    }

    public function isSubdomainAvailable($subdomain)
    {
        return !static::where('subdomain', $subdomain)
                     ->where('id', '!=', $this->id ?? 0)
                     ->exists();
    }

    private function isValidDomain($domain)
    {
        return filter_var('http://' . $domain, FILTER_VALIDATE_URL) !== false;
    }

    // Auto generate slug and subdomain when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invitation) {
            if (!$invitation->slug) {
                $invitation->slug = $invitation->generateUniqueSlug();
            }

            // Set default domain type
            if (!$invitation->domain_type) {
                $invitation->domain_type = self::DOMAIN_TYPE_PATH;
            }

            // Auto-generate subdomain for premium users or paid templates
            if ($invitation->shouldAutoEnableSubdomain()) {
                $subdomain = $invitation->generateSubdomain();
                if ($invitation->isSubdomainAvailable($subdomain)) {
                    $invitation->subdomain = $subdomain;
                    $invitation->domain_type = self::DOMAIN_TYPE_SUBDOMAIN;
                }
            }
        });

        static::updating(function ($invitation) {
            // Regenerate subdomain if invitation data changes
            if ($invitation->isDirty('invitation_data') && $invitation->subdomain) {
                $newSubdomain = $invitation->generateSubdomain();
                if ($newSubdomain !== $invitation->subdomain && $invitation->isSubdomainAvailable($newSubdomain)) {
                    $invitation->subdomain = $newSubdomain;
                }
            }
        });
    }

    public function shouldAutoEnableSubdomain()
    {
        // Enable subdomain automatically for:
        // 1. Premium templates
        // 2. Premium users
        // 3. Paid orders
        
        return $this->template->is_premium || 
               $this->user->isPremium() ||
               $this->hasValidOrder();
    }

    public function hasValidOrder()
    {
        return $this->user->orders()
                         ->where('template_id', $this->template_id)
                         ->where('status', 'paid')
                         ->exists();
    }

    // QR Code generation for easy sharing
    public function getQrCodeAttribute()
    {
        // You can use a QR code library here
        return "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($this->public_url);
    }

    // Social sharing URLs
    public function getWhatsappShareUrlAttribute()
    {
        $text = "Undangan Digital: " . $this->title . " - " . $this->public_url;
        return "https://wa.me/?text=" . urlencode($text);
    }

    public function getFacebookShareUrlAttribute()
    {
        return "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($this->public_url);
    }

    public function getTwitterShareUrlAttribute()
    {
        $text = "Undangan Digital: " . $this->title;
        return "https://twitter.com/intent/tweet?text=" . urlencode($text) . "&url=" . urlencode($this->public_url);
    }
}