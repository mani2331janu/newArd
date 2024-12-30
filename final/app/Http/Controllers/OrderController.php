<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'foodCategory' => 'required|string',
            'foodItem' => 'required|array',
            'quantities' => 'required|array',
            'rate' => 'required|numeric',
            'gst' => 'required|numeric',

            'totalPrice' => 'required|numeric',
        ]);
        
        try {
            
            $user_id = Auth::id();

            Order::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'food_category' => $data['foodCategory'],
                'food_items' => json_encode($data['foodItem']),
                'quantities' => json_encode($data['quantities']),
                'rate' => $data['rate'],
                'gst' => $data['gst'],

                'total_price' => $data['totalPrice'],
                'created_by'=>$user_id
            ]);

            return response()->json(['message' => 'Order saved successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save order. Please try again.'], 500);
        }
    }
}
