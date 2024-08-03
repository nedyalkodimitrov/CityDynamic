<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function showUsers()
    {
        $user = Auth::user();
        $users = \App\Models\User::all();

        return view('admin.pages.users.users')->with(['users' => $users]);
    }

    public function showUser($id)
    {
        $user = \App\Models\User::find($id);
        $roles = Role::all();

        return view('admin.pages.users.user')->with('user', $user)->with('roles', $roles);
    }

    public function showUserCreate()
    {
        $roles = Role::all();

        return view('admin.pages.users.userForm')->with('roles', $roles);
    }

    public function createUser(Request $request)
    {
        $user = auth()->user();
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route('admin.showUsers');

    }

    public function editUser($busId, Request $request)
    {

        $user = User::find($busId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->syncRoles($request->role);

        return redirect()->route('admin.showUsers');

    }
}
