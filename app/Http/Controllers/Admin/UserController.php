<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('role_Id', '0')->get();
        return view('admin.users.index', compact('users'));
    }
}
