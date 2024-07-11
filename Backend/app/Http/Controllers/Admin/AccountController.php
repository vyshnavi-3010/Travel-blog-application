<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }
    public function checkEmail(Request $request)
    {
        $check = Admin::where('email', $request->email)->first();
        if (isset($check->id)) {
            return response()->json([
                'success' => 1,
                'message' => 'Admin Email Found'
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Admin Email Not Found'
            ]);
        }
    }
    public function loginAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'message' => 'Please Check Input Fields'
            ]);
        }
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(url('admin/dashboard'));
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Incorrect Credentials'
            ]);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        auth('admin')->logout();
        return redirect(route('admin.login'));
    }
}
