<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function createAccount()
    {
        return view('create-account');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function verificationCode()
    {
        return view('auth.verification_code');
    }
}
