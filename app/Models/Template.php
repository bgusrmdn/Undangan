<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'preview_images',
        'demo_data',
        'html_structure',
        'css_styles',
        'customizable_fields',
        'color_schemes',
        'font_options',
        'is_premium',
        'is_active',
        'downloads_count',
        'rating',
        'reviews_count',
        'tags',
        'created_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'preview_images' => 'array',
        'demo_data' => 'array',
        'customizable_fields' => 'array',
        'color_schemes' => 'array',
        'font_options' => 'array',
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
        'rating' => 'decimal:1',
    ];

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Helper methods
    public function isFree()
    {
        return $this->price == 0;
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function incrementDownloads()
    {
        $this->increment('downloads_count');
    }
}