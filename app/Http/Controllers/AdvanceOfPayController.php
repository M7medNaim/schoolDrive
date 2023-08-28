<?php

namespace App\Http\Controllers;

use App\Models\AdvanceOfPay;
use App\Models\Employee;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvanceOfPayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AdvanceOfPays = AdvanceOfPay::all();
        return response()->view('cms.advanceOfPay.index', compact('AdvanceOfPays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return response()->view('cms.advanceOfPay.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'advance_date' => 'required|date',
            'amount' => 'required|numeric',
        ], [
            'employee_id.required' => 'يجب اختيار الموظف',
            'employee_id.exists' => 'الموظف غير موجود',
            'advance_date.required' => 'تاريخ السلفة مطلوب',
            'advance_date.date' => 'تاريخ السلفة غير صحيح',
            'amount.required'=>'يجب ادخال المبلغ',
            'amount.numetric'=>'المبلغ يجب أن يكون رقم',
        ]);
        if (!$validator->fails()) {
            $AdvanceOfPay = new AdvanceOfPay();
            $AdvanceOfPay->employee_id = $request->input('employee_id');
            $AdvanceOfPay->advance_date = $request->input('advance_date');
            $AdvanceOfPay->amount = $request->input('amount');
            $isSaved = $AdvanceOfPay->save();
            if ($isSaved) {
                return response()->json([
                    'message' => 'تم التخزين بنجاح',
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
    public function show(AdvanceOfPay $AdvanceOfPay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdvanceOfPay $AdvanceOfPay)
    {
        $employees = Employee::all();
        return response()->view('cms.AdvanceOfPay.edit', compact('AdvanceOfPay', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvanceOfPay $AdvanceOfPay)
    {
        $validator = Validator($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'advance_date' => 'required|date',
            'amount' => 'required|numeric',
        ], [
            'employee_id.required' => 'يجب اختيار الموظف',
            'employee_id.exists' => 'الموظف غير موجود',
            'advance_date.required' => 'تاريخ السلفة مطلوب',
            'advance_date.date' => 'تاريخ السلفة غير صحيح',
            'amount.required'=>'يجب ادخال المبلغ',
            'amount.numetric'=>'المبلغ يجب أن يكون رقم',
        ]);
    
        if (!$validator->fails()) {
            if ($AdvanceOfPay) {
                $AdvanceOfPay->employee_id = $request->input('employee_id');
                $AdvanceOfPay->advance_date = $request->input('advance_date');
                $AdvanceOfPay->amount = $request->input('amount');
                $isSaved = $AdvanceOfPay->update();
    
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
                    'message' => 'الدرس غير موجود'
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
    public function destroy(AdvanceOfPay $AdvanceOfPay)
    {
        $AdvanceOfPay->delete();
    }
}
