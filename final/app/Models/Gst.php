<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GST extends Model
{
    use HasFactory;

    protected $fillable = ['rate'];

    public function foodItems()
    {
        return $this->hasMany(FoodItem::class);
    }
}
