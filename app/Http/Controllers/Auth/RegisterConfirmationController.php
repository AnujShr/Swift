<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

class RegisterConfirmationController extends Controller
{
    public function index()
    {
        try{
            User::where('confirmation_token', request('token'))->firstorFail()->update(['confirmed' => true,'confirmation_token' => null]);
        }catch (\Exception $e){
            return redirect(route('register'))
                ->with('error','Unknown token');
        }
        return redirect('/');
    }
}
