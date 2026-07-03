<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'facebook_page_id',
        'user_id',
        'conversation_id',
        'last_message_at',
    ];
}
