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

    // Helper methods
    public function getPublicUrlAttribute()
    {
        if ($this->custom_domain) {
            return 'https://' . $this->custom_domain;
        }
        return route('invitation.show', $this->slug);
    }

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

    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function generateUniqueSlug()
    {
        $slug = Str::slug($this->title);
        $count = 1;
        
        while (static::where('slug', $slug)->exists()) {
            $slug = Str::slug($this->title) . '-' . $count;
            $count++;
        }

        return $slug;
    }

    // Auto generate slug when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invitation) {
            if (!$invitation->slug) {
                $invitation->slug = $invitation->generateUniqueSlug();
            }
        });
    }
}