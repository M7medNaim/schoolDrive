<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return response()->view('cms.trainer.index', compact('trainers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'driving_license' => 'required|numeric',
            'training_number' => 'required|numeric',
            'license_degree' => 'required|string',
            'license_expiration_date' => 'required|date',
        ], [
            'name.required' => 'يرجى إدخال الاسم',
            'name.string' => 'الاسم يجب أن يكون نصيًا',
            'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرفًا',
            'id_number.required' => 'يرجى إدخال رقم الهوية',
            'id_number.numeric' => 'رقم الهوية يجب أن يكون رقمًا',
            'phone.required' => 'يرجى إدخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون رقمًا',
            'driving_license.required' => 'يرجى إدخال رقم رخصة القيادة',
            'driving_license.numeric' => 'رقم رخصة القيادة يجب أن يكون رقمًا',
            'training_number.required' => 'يرجى إدخال رقم التدريب',
            'training_number.numeric' => 'رقم التدريب يجب أن يكون رقمًا',
            'license_degree.required' => 'يرجى إدخال درجة الرخصة',
            'license_expiration_date.required' => 'يرجى إدخال تاريخ انتهاء الرخصة',
            'license_expiration_date.date' => 'تاريخ انتهاء الرخصة يجب أن يكون تاريخًا صحيحًا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->id_number = $request->input('id_number');
        $trainer->phone = $request->input('phone');
        $trainer->driving_license = $request->input('driving_license');
        $trainer->training_number = $request->input('training_number');
        $trainer->license_degree = $request->input('license_degree');
        $trainer->license_expiration_date = $request->input('license_expiration_date');
        $isSaved = $trainer->save();

        if ($isSaved) {
            return response()->json([
                'message' => 'تم التخزين بنجاح',
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'هناك مشكلة في التخزين'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        return response()->view('cms.trainer.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'driving_license' => 'required|numeric',
            'training_number' => 'required|numeric',
            'license_degree' => 'required|string',
            'license_expiration_date' => 'required|date',
        ], [
            'name.required' => 'يرجى إدخال الاسم',
            'name.string' => 'الاسم يجب أن يكون نصيًا',
            'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرفًا',
            'id_number.required' => 'يرجى إدخال رقم الهوية',
            'id_number.numeric' => 'رقم الهوية يجب أن يكون رقمًا',
            'phone.required' => 'يرجى إدخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون رقمًا',
            'driving_license.required' => 'يرجى إدخال رقم رخصة القيادة',
            'driving_license.numeric' => 'رقم رخصة القيادة يجب أن يكون رقمًا',
            'training_number.required' => 'يرجى إدخال رقم التدريب',
            'training_number.numeric' => 'رقم التدريب يجب أن يكون رقمًا',
            'license_degree.required' => 'يرجى إدخال درجة الرخصة',
            'license_degree.numeric' => 'درجة الرخصة يجب أن تكون رقمًا',
            'license_expiration_date.required' => 'يرجى إدخال تاريخ انتهاء الرخصة',
            'license_expiration_date.date' => 'تاريخ انتهاء الرخصة يجب أن يكون تاريخًا صحيحًا',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        if (!$trainer) {
            return response()->json([
                'message' => 'المركبة غير موجودة'
            ], Response::HTTP_NOT_FOUND);
        }

        $trainer->name = $request->input('name');
        $trainer->id_number = $request->input('id_number');
        $trainer->phone = $request->input('phone');
        $trainer->training_number = $request->input('training_number');
        $trainer->driving_license = $request->input('driving_license');
        $trainer->license_degree = $request->input('license_degree');
        $trainer->license_expiration_date = $request->input('license_expiration_date');
        $isSaved = $trainer->update();

        if ($isSaved) {
            return response()->json([
                'message' => 'تم التحديث بنجاح',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'هناك مشكلة في التحديث'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
    }
}
