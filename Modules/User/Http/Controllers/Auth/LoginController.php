<?php

namespace Modules\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function showLoginForm(){
        return view('User::Front.auth.login');
    }

    public function credentials(Request $request){
        $username = $request->get($this->username());
        $field = filter_var($username , FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        return [
            $field => $username,
            'password' => $request->password,
        ];
    }
}
