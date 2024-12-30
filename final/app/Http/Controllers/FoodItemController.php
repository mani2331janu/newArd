<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function getCate(Request $request){
               if($request->ajax()){
                $categories = Category::select('category_name')->distinct()->get();
                return response()->json($categories);
               }
    }

    public function getItem(Request $request){
        if ($request->ajax() && $request->has('category_name')) {
            $categoryName = $request->category_name;
            $foodItems = FoodItem::whereHas('category', function ($q) use ($categoryName) {
                $q->where('category_name', $categoryName);
            })
            ->join('gst', 'food_items.gst_id', '=', 'gst.id') 
            ->select('food_items.food_name', 'food_items.price', 'gst.rate as gst_rate') 
            ->get();

            return response()->json($foodItems);
        }
    }
}
