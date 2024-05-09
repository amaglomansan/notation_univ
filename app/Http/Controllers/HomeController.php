<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App\models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public  function index()
    {
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                return view('dashboard',compact('usertype'));
            }

            elseif ($usertype == 'admin'){
                return view('dashboardad',compact('usertype'));
            }

            else{
                return redirect()->back();
            }
        }
    }

    public function open(){
        return view('admin.dashboardadmin');
    }

    public function openuser(){
        return view('utilisateur.dashboarduser');
    }


}
