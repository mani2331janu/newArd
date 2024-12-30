<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = ['food_name', 'price', 'category_id', 'gst_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gst()
    {
        return $this->belongsTo(GST::class);
    }
}
