<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->view('cms.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'user_name' => 'required|string',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|min:5|max:25',

        ] , [
            'user_name.required'=> 'اسم المستخدم مطلوب',
            'user_email.required'=> 'ايميل المستخدم مطلوب',
            'user_email.email'=> 'يجب ادخال ايميل صحيح',
            'user_email.unique'=> 'هذا الايميل مستخدم بالفعل',
            'user_password.required'=> 'كلمة مرور المستخدم مطلوبة',
            'user_password.max'=> 'كلمة مرور المستخدم اكتر من 25 حرف',
            'user_password.min'=> 'كلمة مرور المستخدم اقل من 5 احرف',
        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->input('user_name');
            $user->email = $request->input('user_email');
            $user->password = Hash::make($request->input('user_password'));
            $isSaved = $user->save();
            if ($isSaved) {
                return response()->json([
                    'message' => 'تم التخزين بنجاح'
                ], Response::HTTP_CREATED);
            } else {
                return response()->json([
                    'message' => 'هناك مشكلة في التخزين'
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return response()->view('cms.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator($request->all(), [
            'user_name' => 'required|string',
            'user_email' => 'required',
            'user_password' => 'nullable|min:5|max:25',
        ], [
            'user_name.required'=> 'اسم المستخدم مطلوب',
            'user_name.string'=> 'اسم المستخدم يجب ان يكون نص',
            'user_email.required'=> 'ايميل المستخدم مطلوب',
            'user_email.email'=> 'يجب ادخال ايميل صحيح',
            'user_email.unique'=> 'هذا الايميل مستخدم بالفعل',
            'user_password.required'=> 'كلمة مرور المستخدم مطلوبة',
            'user_password.max'=> 'كلمة مرور المستخدم اكتر من 25 حرف',
            'user_password.min'=> 'كلمة مرور المستخدم اقل من 5 احرف',
        ]);
        if (!$validator->fails()) {
            $user->name = $request->input('user_name');
            $user->email = $request->input('user_email');
            $newPassword = $request->input('user_password');
            if ($newPassword) {
                $user->password = Hash::make($newPassword);
            }
            $isUpdated = $user->update();
            if ($isUpdated) {
                return response()->json([
                    'message' => 'تم التعديل بنجاح'
                ], Response::HTTP_CREATED);
            } else {
                return response()->json([
                    'message' => 'هناك مشكلة في التعديل'
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
