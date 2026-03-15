<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:users.read');
    }

    public function index()
    {
        $users = User::query()->with('roles')->latest()->get();

        return view('users.index', compact('users'));
    }
}
