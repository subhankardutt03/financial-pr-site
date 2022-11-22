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
        return view('admin.login')->with('success', 'This is login page');
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        // $validate = $request->validate([
        //     'email' => 'required|email|unique:admins',
        //     'password' => 'required'
        // ]);

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $admin = Auth::guard('admin')->user();
            Admin::where('email', $admin->email)->update([
                'status' => 'active'
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'you have loggedIn successfully');
        } else {
            return back()->with('error', 'Please check your given credential');
        }
    }

    public function Dashboard()
    {
        return view('admin.dashboard');
    }

    public function Logout()
    {
        $admin = Auth::guard('admin')->user();
        Auth::guard('admin')->logout();
        Admin::where('email', $admin->email)->update([
            'status' => 'inactive'
        ]);

        return redirect()->route('admin.login.page')->with('success', 'Admin logged out successfully');
    }
}