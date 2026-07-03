<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'status',
        'subscription_plan',
        'subscription_ends_at',
        'trial_ends_at',
    ];

    protected $casts = [
        'subscription_ends_at' => 'datetime',
        'trial_ends_at' => 'datetime',
    ];

    // Relationships
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pages()
    {
        return $this->hasMany(FacebookPage::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function usage()
    {
        return $this->hasMany(Usage::class);
    }
}
