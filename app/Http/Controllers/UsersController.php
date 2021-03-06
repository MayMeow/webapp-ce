<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Traits\RequireAuthenticationTrait;

class UsersController extends Controller
{
    use RequireAuthenticationTrait;
    
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('admin.users.show', compact('user', 'roles'));
    }
}
