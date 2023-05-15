<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Roule;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUserWithProfile()
    {
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'johndoe1@example.com';
        $user->password = bcrypt('password'); // Set a password value here
        $user->save();

        $profile = new Profile();
        $profile->bio = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $user->profile()->save($profile);

        return "User created with profile.";
    }

    public function ManyToMany(){
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'johndoe3@example.com';
        $user->password = bcrypt('password');
        $user->save();
    
        $role1 = new Roule();
        $role1->name = 'Admin';
        $role1->save();
    
        $role2 = new Roule();
        $role2->name = 'Editor';
        $role2->save();
    
        $user->roles()->attach([$role1->id, $role2->id]);
    
    }

    public function ManyToManyIndex(){
        $user = User::with('roles')->find(1);
        $roles = $user->roles;

        return view('test', compact('user', 'roles'));
        
    }
}
