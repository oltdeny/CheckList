<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckList;
use App\Models\Item;


class ItemController extends Controller
{
    public function create(CheckList $list)
    {
        $this->authorize('create', $list);
        return view('lists/items/create', [
            'list' => $list
        ]);
    }

    public function store(Request $request, CheckList $list)
    {
        $item = new Item();
        $item->fill([
            'name' => $request->name,
            'check_list_id' => $list->id
        ]);
        $item->save();
        return redirect()->route('lists.show', $list->id);
    }

    public function update(Request $request, $list, $id)
    {
        $item = Item::find($id);
        $item->status = 'done';
        $item->save();
        return redirect()->route('lists.show', $list);
    }

    public function destroy($list, $id)
    {
        Item::destroy($id);
        return redirect()->route('lists.show', $list);
    }
}
