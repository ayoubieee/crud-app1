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

    public function show($id)
    {
        $item = Item::find($id);
        if($item){
            return response()->json([
                'status' => 200,
                'items' => $item
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "no items found"
            ], 404);
        }
    }

    public function edit($id)
    {
        $item = Item::find($id);
        if($item){
            return response()->json([
                'status' => 200,
                'items' => $item
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "no items found"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
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
            $item = Item::find($id);
            $item->update([
                'name' => $request->name,
                'price' => $request->price
            ]);

            if ($item) {
                return response()->json([
                    'status' => 200,
                    'message' => "Item updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Something went wrong"
                ], 404);
            }
        }
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if($item){
            $item->delete();
            return response()->json([
                'status' => 200,
                'message' => "Item Deleted Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "no items found"
            ], 404);
        }
    }

}
