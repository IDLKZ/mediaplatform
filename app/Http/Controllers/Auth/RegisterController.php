<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function register()
    {
        $validator = JsValidator::make( [
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        return view('Auth.register', compact('validator'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $role_id = $request->get('role') == 'teacher' ? 2 : 3;

        User::create([
           'name' => $request->get('name'),
           'role_id' => $role_id,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);
        Toastr::success('Ваша заявка успешно принята!','Success');
        return redirect('/');

    }

}
