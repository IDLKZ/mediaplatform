<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;


class LoginController extends Controller
{
    public function login()
    {
        $validator = JsValidator::make( [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        return view('Auth.login', compact("validator"));
    }

    public function signIn(Request $request){

        $this->validate($request,
            ["email"=>"required|email","password"=>"required|min:6"]
        );
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            Toastr::success('Вход успешно выполнен','Добро пожаловать!');
            return redirect(route('main'));
        }
        else{
            Toastr::error('Неверные данные','Уппс...');
            return redirect()->back();
        }

    }


    public function googleLogin(){


        return Socialite::driver("google")->stateless()->redirect();
    }

    public function googleCallback(){
        $user_verifaction = Socialite::driver("google")->stateless()->user();
        $user = User::where(["email"=>$user_verifaction->getEmail()])->first();
        if($user){
            Auth::login($user,1);
            Toastr::success('Вход успешно выполнен','Добро пожаловать!');
            return redirect(route('main'));
        }
        else{
            Toastr::warning('Оставьте заявку','Уппс...');
            return redirect(route("register"));
        }

    }

}
