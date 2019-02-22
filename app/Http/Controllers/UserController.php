<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $this->authorize('lookAll', User::class);
        $users = User::where('id', '!=', Auth::id())->get();
        return view('users/users', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $this->authorize('edit', User::class);
        return view('users/edit', [
           'user' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->count = $request->count;
        $user->save();
        return redirect()->route('users.index');
    }

    public function block(Request $request, User $user)
    {
        $this->authorize('block', User::class);
        $user->status = 'blocked';
        $user->save();
        return redirect()->route('users.index');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        //
    }
}
