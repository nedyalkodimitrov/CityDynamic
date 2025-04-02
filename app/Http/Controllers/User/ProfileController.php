<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('user.pages.profile.profile');
    }

    public function editProfile()
    {
        //todo
    }
}
