<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class SignupController extends Controller
{
    public function index(){
        return view('signup', [
            'title' => 'Singup'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'unique:users'],
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        User::create($validatedData);

        $request->session()->flash('success', 'Registrasi Berhasil silahkan login');

        return redirect('/loginPage');
    }
}
