<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.Login');
    }

    public function login_proses(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password'), 
            ];

        if (Auth::attempt($data)) {
            return redirect()->route('index')->with('success', 'Login Success');
        } else {
            return redirect()->route('login')->with('error', 'Incorrect Email or Password');
        }
    }

    public function register()
    {
        return view('Auth.Register');
    }

    public function register_proses(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('index')->with('success', 'Register Success');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
