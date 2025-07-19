<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'avatar',
        'wallet_balance',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'wallet_balance' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    // Role helpers
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    // Relationships
    public function templates()
    {
        return $this->hasMany(Template::class, 'created_by');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function customRequests()
    {
        return $this->hasMany(CustomRequest::class);
    }

    public function assignedRequests()
    {
        return $this->hasMany(CustomRequest::class, 'assigned_to');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}