<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User; 

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype=='1') {
            return view('admin.home');
        }
        else if($usertype=='2'){
            return view('hotel.home');
        }
        else{
            return view('home.index');
        }
    }
}
