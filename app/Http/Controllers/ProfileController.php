<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $users = User::with('profile')->get();

        return view('profile.show', compact('users'));
    }
}
