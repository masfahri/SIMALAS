<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->except(['_token']);
        $user = User::where('email', $credentials['email']);
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.index');
        }else{
            session()->flash('error', 'Invalid Credential');
            return redirect()->back();
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('auth.login.index')->with('success', 'Success Logout');
        } return redirect()->route('auth.login.index')->with('success', 'Success Logout');
    }
}
