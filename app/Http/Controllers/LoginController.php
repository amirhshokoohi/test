<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{

    public function index()
    {
        if (Auth::check()){
            return redirect('admin/dashboard')->with('success', '  خوش برگشتی :)  ');
        }
        return view('login');
    }

    public function authenticated(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('admin/dashboard')->with('toast_success', '  با موفقیت وارد شدید ! ');
        }

        return redirect()->back()->with('toast_error', '! نام کاربری یا رمز عبور صحیح نیست ')->withInput();
    }
}
