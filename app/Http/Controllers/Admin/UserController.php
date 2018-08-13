<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        return view('admin.users.index');
    }

    public function create()
    {
        try {
            return DataTables::of(User::query()->where('role_Id', '0'))->make(true);
        } catch (\Exception $e) {
            return '';
        }
    }
    function loginAs($id)
    {
        Auth::logout();
        Auth::loginUsingId($id);
        Session::put('login-as-brewer', true);
        return redirect('profile');
    }
}
