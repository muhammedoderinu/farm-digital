<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $admin = User::where('username', $request->username)->first();
        
 
        if ($admin && Hash::check($request->password, $admin->password)) {
        
            Auth::login($admin);
            return to_route('form');
        }

        dd('no');

        return back();
    }
}
