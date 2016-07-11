<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Models\User;


class LoginController extends Controller
{
    public function getLogin() 
    {
    	if (!Auth::check()) {
            return view('dashboard.login.login');
        } else {
            return redirect('lar_dashboard');
        }
    }

    public function postLogin(LoginRequest $request) 
    {
    	$inputData = [
            'user_login'  => $request->inputUserLogin,
            'password'    => $request->inputUserPassword,
            'user_status' => 1
    	];

    	if (Auth::attempt($inputData)) :
			
			return redirect('lar_dashboard');

        else :

        	return redirect()->back();

        endif;
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect()->route('getLogin');
    }
}
