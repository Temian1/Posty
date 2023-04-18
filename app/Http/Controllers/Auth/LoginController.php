<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        // dd($request->remember);
        // validate inputs
        $this->validate($request, [
            'email' =>'required|email',
            'password' =>'required',
        ]);

        // login after registration complete
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        // redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
