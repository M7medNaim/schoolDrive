<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Carexpense;
use App\Notifications\Car as NotificationsCar;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cars = Car::all();
        return response()->view('cms.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'type_car' => 'required|in:تجاري,ملاكي عادي,ملاكي أتوماتيك',
            'license_expiry' => 'required|date',
            'Insurance_expiry' => 'required|date',
            'model' => 'required|numeric',
            'car_number' => 'required|regex:/^[\d-]+$/',
        ], [
            'type_car.required' => 'يجب اختيار نوع المركبة',
            'type_car.in' => 'نوع المركبة يجب أن يكون "تجاري" أو "ملاكي"',
            'license_expiry.required' => 'يجب إدخال تاريخ انتهاء الرخصة',
            'license_expiry.date' => 'تاريخ انتهاء الرخصة غير صحيح',
            'Insurance_expiry.required' => 'يجب إدخال تاريخ انتهاء التأمين',
            'Insurance_expiry.date' => 'تاريخ انتهاء التأمين غير صحيح',
            'model.required' => 'يجب إدخال موديل المركبة',
            'model.numeric' => 'موديل المركبة يجب أن يكون رقمًا',
            'car_number.required' => 'يجب إدخال رقم المركبة',
            'car_number.regex' => 'رقم المركبة يجب أن يكون رقما',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $car = new Car();
        $car->type_car = $request->input('type_car');
        $car->license_expiry = $request->input('license_expiry');
        $car->Insurance_expiry = $request->input('Insurance_expiry');
        $car->model = $request->input('model');
        $car->car_number = $request->input('car_number');
        $isSaved = $car->save();

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
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return response()->view('cms.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validator = Validator($request->all(), [
            'type_car' => 'required|in:تجاري,ملاكي عادي,ملاكي أتوماتيك',
            'license_expiry' => 'required|date',
            'Insurance_expiry' => 'required|date',
            'model' => 'required|numeric',
            'car_number' => 'required|regex:/^[\d-]+$/',
        ], [
            'type_car.required' => 'يجب اختيار نوع المركبة',
            'type_car.in' => 'نوع المركبة يجب أن يكون "تجاري" أو "ملاكي"',
            'license_expiry.required' => 'يجب إدخال تاريخ انتهاء الرخصة',
            'license_expiry.date' => 'تاريخ انتهاء الرخصة غير صحيح',
            'Insurance_expiry.required' => 'يجب إدخال تاريخ انتهاء التأمين',
            'Insurance_expiry.date' => 'تاريخ انتهاء التأمين غير صحيح',
            'model.required' => 'يجب إدخال موديل المركبة',
            'model.numeric' => 'موديل المركبة يجب أن يكون رقمًا',
            'car_number.required' => 'يجب إدخال رقم المركبة',
            'car_number.regex' => 'رقم المركبة يجب أن يكون رقما',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        if (!$car) {
            return response()->json([
                'message' => 'المركبة غير موجودة'
            ], Response::HTTP_NOT_FOUND);
        }

        $car->type_car = $request->input('type_car');
        $car->license_expiry = $request->input('license_expiry');
        $car->Insurance_expiry = $request->input('Insurance_expiry');
        $car->model = $request->input('model');
        $car->car_number = $request->input('car_number');
        $isSaved = $car->update();

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
    public function destroy(Car $car)
    {
        $car->delete();
    }

    public function viewcarexpenses(Car $car)
    {
        $carexpenses = Carexpense::where('car_id', $car->id)->get();
        return view('cms.car.view_carexpense', compact('carexpenses', 'car'));
    }
}
