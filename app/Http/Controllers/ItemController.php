<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckList;
use App\Models\Item;


class ItemController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CheckList $list)
    {
        return view('lists/items/create', [
            'list' => $list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $list, $id)
    {
        $item = Item::find($id);
        $item->status = 'done';
        $item->save();
        return redirect()->route('lists.show', $list);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($list, $id)
    {
        Item::destroy($id);
        return redirect()->route('lists.show', $list);
    }
}
