<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckList;
use App\Models\Item;
use App\User;
use Illuminate\Support\Facades\Auth;



class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('lists/lists', ['lists' => CheckList::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkList = new CheckList();
        $checkList->fill([
            'name' => $request->name,
            'user_id' => Auth::id()
        ]);
        $checkList->save();
        return redirect()->route('lists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = CheckList::find($id);
        return view('lists/show', [
            'list' => $list
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CheckList::destroy($id);
        return redirect()->route('lists.index');
    }
}
