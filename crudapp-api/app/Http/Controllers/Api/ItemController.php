<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Item; // Import the Item model

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return response()->json([
            'status' => 200,
            'items' => $items
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'price' => 'required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages() // Use messages() instead of message()
            ], 422);
        } else {
            $item = Item::create([
                'name' => $request->name,
                'price' => $request->price
            ]);

            if ($item) {
                return response()->json([
                    'status' => 200,
                    'message' => "Item Created Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong"
                ], 500);
            }
        }
    }
}
