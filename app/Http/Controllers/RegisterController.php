<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;

use App\User;

class RegisterController extends Controller
{
    protected function guard()
    {
        return Auth::guard();
    }


    public function index(RegisterFormRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        $this->guard()->login($user);

        return response([
            'status' => 'success',
            'data' => $user
           ], 200);
     }
}