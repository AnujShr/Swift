<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $users = User::query()->where('role_Id', '0')->paginate(10);
        if ($request->ajax()) {
            return response()->json(view('admin.users.index', compact('users'))->render());
        }
        return view('admin.users.index', compact('users'));
    }

    function loginAs($id)
    {
        Auth::logout();
        Auth::loginUsingId($id);
        Session::put('login-as-brewer', true);
        return redirect('profile');
    }
}
