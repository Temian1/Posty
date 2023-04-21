<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd($request->email);

        // validate inputs
        $this->validate($request, [
            'name' =>'required|max:255',
            'username' =>'required|max:255',
            'email' =>'required|email|max:255',
            'password' =>'required|confirmed',
        ]);

        // store
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'member_id' => substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8),
            'password' => Hash::make($request->password)
        ]);

        // login after registration complete
        auth()->attempt($request->only('email', 'password'));

        // redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
