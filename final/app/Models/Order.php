<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'food_category',
        'food_items',
        'quantities',
        'rate',
        'gst',
        'total_price',
        'created_by',
    ];

    protected $casts = [
        'quantities' => 'array',
    ];
}
