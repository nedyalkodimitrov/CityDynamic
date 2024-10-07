<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = \App\Models\User::all();

        return view('admin.pages.users.users')->with(['users' => $users]);
    }

    public function showUser(User $id)
    {
        return view('admin.pages.users.user')->with('user', $id);
    }

    public function showUserCreate()
    {
        return view('admin.pages.users.userForm');
    }

    public function createUser(Request $request, UserRepository $userRepository)
    {
        $userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.showUsers');
    }

    public function editUser(User $id, Request $request, UserRepository $userRepository)
    {
        $userRepository->update($id, [
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.showUsers');
    }
}
