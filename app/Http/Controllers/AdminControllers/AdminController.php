<?php

namespace App\Http\Controllers\AdminControllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields))
        {
            $user = User::where('email', $request->email)->first();

            if ($user->hasRole('admin'))
            {
                return redirect()->route('admin.home');
            }
        }
        return back()->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');
    }

    // Admin Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        return redirect('/admin/login')->with('message', 'You have been logged out Successfully');
    }
    
    public function home (Request $request)
    {
        return view('admin.home');
    }
}
