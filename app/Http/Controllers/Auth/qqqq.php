<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Bestmomo\LaravelEmailConfirmation\Traits\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     */
    
    protected function credentials(Request $request)
    {
        $logValue = $request->input($this->username());

        $logKey = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return [
            $logKey => $logValue,
            'password' => $request->input('password'),
        ];
    }
}
