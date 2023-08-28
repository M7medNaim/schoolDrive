<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLogin(){
        return response()->view('cms.auth.login');
    }
    /*   */
    public function login(Request $request){
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
            'remember' =>'required|boolean'
        ] , [
            'email.required' => 'حقل الايميل مطلوب',
            'email.email' => 'يجب ادخال ايميل صحيح',
            'password.required' => 'حقل كلمة المرور مطلوب',
        ]);
        if(! $validator->fails()){
            $credentials = ['email'=>$request->input('email') , 'password'=>$request->input('password')];
            if(Auth::guard('web')->attempt($credentials , $request->input('remember'))){
                return response()->json([
                    'message'=>"تم تسجيل الدخول بنجاح"
                ], Response::HTTP_OK);
            }else {
                return response()->json([
                    'message'=>"خطأ في تسجيل الدخول , افحص كلمة المرور او اسم المستخدم"
                ], Response::HTTP_BAD_REQUEST);
            }
        }else {
            return response()->json([
                'message'=>$validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('cms.logout'));
    }
}
