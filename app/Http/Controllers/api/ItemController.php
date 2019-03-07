<?php

namespace App\Http\Controllers\api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'id' => 'required|integer'
        ]);

        $checklist = auth()->user()->checkLists()->find($request->id);
        if (!$checklist) {
            return response()->json([
                'success' => false,
                'message' => "You can not add items to someone else's check-list"
            ], 400);
        }

        $item = new Item();
        $item->fill([
            'name' => $request->name,
            'check_list_id' => $request->id
        ]);
        $item->save();

        return response()->json([
            'success' => true,
            'item' => $item
        ], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'check_list_id' => 'required|integer'
        ]);

        $checklist = auth()->user()->checkLists()->find($request->check_list_id);
        if(!$checklist) {
            return response()->json([
                'success' => false,
                'message' => "Checklist with id $request->check_list_id not found in your list"
            ], 400);
        }
        $item = $checklist->items()->find($id);
        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => "Item with id $id not found"
            ], 400);
        }
        $item->status = 'done';
        $item->save();
        return response()->json([
            'success' => true,
            'item' => $item
        ], 400);
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            'check_list_id' => 'required|integer'
        ]);

        $checklist = auth()->user()->checkLists()->find($request->check_list_id);
        if(!$checklist) {
            return response()->json([
                'success' => false,
                'message' => "Checklist with id $request->check_list_id not found in your list"
            ], 400);
        }
        $item = $checklist->items()->find($id);
        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => "Item with id $id not found"
            ], 400);
        }
        $item->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
