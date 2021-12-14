<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5|max:255',
            'password_confirmation' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect('/');
    }
}
