<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUserWithProfile()
    {
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'ilham@example.com';
        $user->password = bcrypt('password'); // Set a password value here
        $user->save();

        $profile = new Profile();
        $profile->bio = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $user->profile()->save($profile);

        return "User created with profile.";
    }

    public function ManyToMany()
    {
        // create user 
        $user = new User();
        $user->name = 'Salah Arbani';
        $user->email = 'Salah@example.com';
        $user->password = bcrypt('password');
        $user->save();

        // add roles to user
        $role1 = new Role();
        $role1->name = 'info';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'dev';
        $role2->save();

        $user->roles()->attach([$role1->id, $role2->id]);
    }

    public function ManyToManyIndex()
    {
        $user = User::with('roles')->find(2);
        $roles = $user->roles;
        // $role = Role::find(1);
        // $users = $role->users;
        return view('roles.many', compact('user', 'roles'));
    }
}
