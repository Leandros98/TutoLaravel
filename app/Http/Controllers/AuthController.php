<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function doLogin(LoginRequest $request){
        $credentiales=$request->validated();
        if(Auth::attempt($credentiales)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
       // return to_route('auth.login')->withErrors([
         //   'email'=>'Email invalide'
       // ])->onlyInput('email');
       return back()->withErrors([
        'email'=>'Identifiants incorrects'
    ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
        return to_route('login')->with('success','Vous etes maintenant deconnecte');
    }
}
