<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckListController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if ($user->can('lookAll', CheckList::class)) {
            $lists = CheckList::all();
        } else {
            $lists = CheckList::where('user_id', Auth::id())->get();
        }
        return view('lists/lists', ['lists' => $lists]);
    }

    public function create()
    {
        $this->authorize('create', CheckList::class);
        $count = CheckList::where('user_id', Auth::id())->count();
        if ($count >= 5) {
            return back()
                ->with('error', 'You can not create more than 5 check-lists');
        }
        return view('lists/create');
    }

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

    public function show($id)
    {
        $list = CheckList::find($id);
        $this->authorize('view', $list);
        return view('lists/show', [
            'list' => $list
        ]);
    }

    public function destroy($id)
    {
        $checkList = CheckList::find($id);
        $this->authorize('delete', $checkList);
        CheckList::destroy($checkList->id);
        return redirect()->route('lists.index');
    }
}
