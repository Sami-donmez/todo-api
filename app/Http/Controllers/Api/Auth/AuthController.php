<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['id'] = $user->id;
            $success['email'] = $user->email;
            $success['name'] = $user->name;
            return response()->json($success, 200);
        } else {
            return response()->json(["message"=>'Email veya şifre yanlış.'], 401);
        }
    }

    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if ($user->save()) {
            return response()->json(["message"=>'Kullanıcı başarıyla eklendi.'], 200);
        } else {
            return response()->json(["message"=>'Kullanıcı kaydı sırasında bir sorun oluştu.'], 400);
        }
    }
    public function test(){
        if (Auth::guard('api')->check()) {
            dd("asmi");
        }
        dd("anan");
    }


}
