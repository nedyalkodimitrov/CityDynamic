<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

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
