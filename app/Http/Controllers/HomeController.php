<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TwoFactorCode;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     public function indexs() 
    {
       // auth()->logout();

        return view('auth.twoFactor');
    }

    public function resend()
    {
        $user = auth()->user();


        $user->generateTwoFactorCode();

        $data = User::findorfail($user->id);
        $data->two_factor_code  = $user->two_factor_code;
        $data->two_factor_expires_at = \Carbon\Carbon::now()->addMinutes(10);
        $data->save();

       
        $user->notify(new TwoFactorCode());

        return redirect()->back()->withMessage('The two factor code has been sent again');
    }
}
