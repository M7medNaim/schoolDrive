<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Carexpense;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarexpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carexpenses = Carexpense::all();
        return response()->view('cms.carexpense.index', compact('carexpenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::all();
        return response()->view('cms.carexpense.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
            'reason' => 'required|string',
        ], [
            'car_id.required' => 'يجب إدخال نوع المركبة',
            'car_id.exists' => ' نوع المركبة غير موجود',
            'amount.required' => 'يجب إدخال المبلغ',
            'amount.numeric' => 'المبلغ يجب أن يكون قيمة رقمية',
            'expense_date.required' => 'يجب إدخال تاريخ المصاريف',
            'expense_date.date' => 'تاريخ المصاريف غير صحيح',
            'reason.required' => 'يجب إدخال سبب الصرف',
            'reason.string' => 'سبب الصرف يجب أن يكون نصًّا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $carexpense = new Carexpense();
        $carexpense->car_id = $request->input('car_id');
        $carexpense->amount = $request->input('amount');
        $carexpense->expense_date = $request->input('expense_date');
        $carexpense->reason = $request->input('reason');
        $isSaved = $carexpense->save();

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
    public function show(Carexpense $carexpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carexpense $carexpense)
    {
        $cars = Car::all();
        return response()->view('cms.carexpense.edit', compact('carexpense', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carexpense $carexpense)
    {
        $validator = Validator($request->all(), [
            'car_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
            'reason' => 'required|string',
        ], [
            'car_id.required' => 'يجب إدخال نوع المركبة',
            'car_id.exists' => 'نوع المركبة غير موجود',
            'amount.required' => 'يجب إدخال المبلغ',
            'amount.numeric' => 'المبلغ يجب أن يكون قيمة رقمية',
            'expense_date.required' => 'يجب إدخال تاريخ المصاريف',
            'expense_date.date' => 'تاريخ المصاريف غير صحيح',
            'reason.required' => 'يجب إدخال سبب المصاريف',
            'reason.string' => 'سبب المصاريف يجب أن يكون نصًّا',
        ]);

        if (!$validator->fails()) {

            if ($carexpense) {
                $carexpense->car_id = $request->input('car_id');
                $carexpense->amount = $request->input('amount');
                $carexpense->expense_date = $request->input('expense_date');
                $carexpense->reason = $request->input('reason');
                $isSaved = $carexpense->update();

                if ($isSaved) {
                    return response()->json([
                        'message' => 'تم التحديث بنجاح',
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'message' => 'هناك مشكلة في التحديث'
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                return response()->json([
                    'message' => 'مصروف المركبة غير موجود غير موجود'
                ], Response::HTTP_NOT_FOUND);
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
    public function destroy(Carexpense $carexpense)
    {
        $carexpense->delete();
    }
}
