<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = CheckList::where('user_id', Auth::id())->get();
        return view('lists/lists', ['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = CheckList::where('user_id', Auth::id())->count();
        if ($count >= 5) {
            return back()
                ->with('error', 'You can not create more than 5 check-lists');
        }
        return view('lists/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CheckList::destroy($id);
        return redirect()->route('lists.index');
    }
}
