<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'type', // e.g., "conversation", "embedding"
        'count',
        'period_start',
        'period_end',
    ];
}
