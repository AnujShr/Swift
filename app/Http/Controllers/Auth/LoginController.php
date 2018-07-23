<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password,'type'=>'admin'])) {

            // Authentication passed...
            return redirect()->intended('/admin');
        } else {

            return redirect()->back()->with('error-message', 'Username or password didn\'t matched.');
        }

    }
    public function showLoginForm()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails())  {
            return response()->json($validation->errors()->toArray(), 422);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user_exist=User::where('email',$email)->first();
        if(!$user_exist){
            $data['email']='Account doesn\'t exist.';
            return response()->json($data, 422);
        }

        $user = User::query()->where(['email'=>$email])->where('confirmed', 1)->first();
        if(!$user){
            $data['email']='Account not activated. Please check your email for the activation link.';
            return response()->json($data, 422);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password,'confirmed'=>1])) {
                $data['success']=true;
                $data['redirect']=$this->redirectTo;
                return response()->json($data,200);

        }else{
            $data['email']='Credentials didn\'t match our records.';
            return response()->json($data, 422);
        }
    }

    public function logout() {
        // $user_type=Auth::user()->type;
        Auth::logout();
        return redirect('/');
    }

}
