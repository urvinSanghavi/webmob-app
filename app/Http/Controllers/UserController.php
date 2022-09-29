<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password'  => 'required|password',
            ]
        );
        unset($data['_token']);
        $data['password'] = Hash::make($data['password']);
        
        User::create($data);

        return redirect()->back()->with('success', 'User Register Successfully.');
    }

    public function login(Request $request){
        
        $data = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        unset($data['_token']);
        if(Auth::attempt($data, true)){
            return redirect('/blog')->with('success', 'User Login Successfully.');
        } else {
            return redirect()->back()->with('error', 'Email and Password Wrong!');
        }

    }

    public function logoutuser(){
        Auth::logout();
        return redirect('/');
    }
}

