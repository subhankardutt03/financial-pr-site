<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function LoginPage()
    {
        return view('admin.login');
    }

    public function Login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required'
        ]);

        // dd($request->all());

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('admin')->user();
            dd($user);
            Admin::where('email', $user->email)->update([
                'status' => 'active'
            ]);
        } else {
            dd('jhgjyfgjhf');
        }
    }
}