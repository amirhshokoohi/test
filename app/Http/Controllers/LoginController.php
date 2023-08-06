<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{

    public function index()
    {
        //toast('Your Post as been submited!','success');
        return view('login');
    }

    public function authenticated(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);
        Setting::create($request->all());
        //dd($credentials);
        //dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->back()
                ->with('success', 'انجام شد!');
        }


        return redirect('/')->with('success', 'سلام');
    }
}
