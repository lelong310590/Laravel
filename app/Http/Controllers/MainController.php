<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getListNav() 
    {
    	$currentAccount = ['id' => Auth::user()->id, 'level' => Auth::user()->user_level];
    	return view('dashboard.modules.main', ['currentAccount' => $currentAccount]);
    }
}
