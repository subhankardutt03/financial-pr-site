<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminAuditLog;
use App\Models\AdminDeviceLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function LoginPage()
    {
        return view('admin.login')->with('success', 'This is login page');
    }

    public function Login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $admin = Auth::guard('admin')->user();
            Admin::where('email', $admin->email)->update([
                'status' => 'active'
            ]);

            AdminDeviceLogin::create([
                'admin_id' => $admin->id,
                'device_token' => Str::random(16),
                'token_status' => 'active'
            ]);

            Session::put('session_token_status', 'active');

            AdminAuditLog::create([
                'admin_id' => $admin->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->server('HTTP_USER_AGENT'),
                'query' => 'Static query',
                'purpose' => 'login',
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
        AdminDeviceLogin::where('admin_id', $admin->id)->update([
            'token_status' => 'inactive'
        ]);
        Session::forget('session_token_status');
        return redirect()->route('admin.login.page')->with('success', 'Admin logged out successfully');
    }
}