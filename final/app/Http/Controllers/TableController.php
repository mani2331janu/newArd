<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TableController extends Controller
{
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $query = Order::query();

            if ($request->foodCategory) {
                $query->where('food_category', $request->foodCategory);
            }

            if ($request->foodItem) {
                $query->where('food_items', 'like', '%' . $request->foodItem . '%');
            }

            if ($request->name) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            return DataTables::of($query->select('*'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('table');
    }
}
