<?php

namespace App\Http\Controllers\api;

use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckListController extends Controller
{

    public function index()
    {
        $checkLists = auth()->user()->checkLists;
        return response()->json([
            'success' => true,
            'data' => $checkLists
        ], 200);
    }

    public function create()
    {
        $user = auth()->user();
        $count = $user->checkLists->count();
        if ($count >= auth()->user()->count) {
            return response()->json([
                'messages' => "could not create more then $user->count checklists",
            ], 500);
        }
        return response()->json([
            'token' => $user->createToken('allowed_to_store')->accessToken
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
        $checklist = CheckList::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);
        return response()->json([
            'success' => true,
            'checklist' => $checklist
        ], 200);
    }

    public function show($id)
    {
        $checklist = auth()->user()->checkLists()->find($id)->load('items');

        if (!$checklist) {
            return response()->json([
                'success' => false,
                'message' => "CheckList with id $id not found in your list"
            ], 400);
        }

        return response()->json([
            'success' => true,
            'checklist' => $checklist
        ], 400);
    }

    public function destroy($id)
    {
        $checklist = auth()->user()->checkLists()->find($id);

        if (!$checklist) {
            return response()->json([
                'success' => false,
                'message' => "CheckList with id $id not found in your list"
            ], 400);
        }

        if ($checklist->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'CheckList could not be deleted'
            ], 500);
        }
    }
}
