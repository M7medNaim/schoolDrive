<?php

namespace App\Http\Controllers;

use App\Models\Schoolexpense;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchoolexpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Schoolexpenses = Schoolexpense::all();
        return response()->view('cms.schoolexpense.index', compact('Schoolexpenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.schoolexpense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'amount' => 'required|numeric',
            'reason' => 'required|string',
            'expense_date' => 'required|date',
            'note' => 'nullable|string',
        ], [
            'amount.required' => 'يجب إدخال المبلغ',
            'amount.numeric' => 'المبلغ يجب أن يكون قيمة رقمية',
            'reason.required' => 'يجب إدخال سبب المصاريف',
            'expense_date.required' => 'يجب إدخال تاريخ المصاريف',
            'expense_date.date' => 'تاريخ المصاريف غير صحيح',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $Schoolexpense = new Schoolexpense();
        $Schoolexpense->amount = $request->input('amount');
        $Schoolexpense->reason = $request->input('reason');
        $Schoolexpense->expense_date = $request->input('expense_date');
        $Schoolexpense->note = $request->input('note');
        $isSaved = $Schoolexpense->save();

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
    public function show(schoolExpense $schoolExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schoolexpense $Schoolexpense)
    {
        return response()->view('cms.schoolexpense.edit', compact('Schoolexpense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schoolexpense $Schoolexpense)
    {
        $validator = Validator($request->all(), [
            'amount' => 'required|numeric',
            'reason' => 'required|string',
            'expense_date' => 'required|date',
            'note' => 'nullable|string',
        ], [
            'amount.required' => 'يجب إدخال المبلغ',
            'amount.numeric' => 'المبلغ يجب أن يكون قيمة رقمية',
            'reason.required' => 'يجب إدخال سبب المصاريف',
            'expense_date.required' => 'يجب إدخال تاريخ المصاريف',
            'expense_date.date' => 'تاريخ المصاريف غير صحيح',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    
        if (!$Schoolexpense) {
            return response()->json([
                'message' => 'لا يوجد مصاريف مدرسة'
            ], Response::HTTP_NOT_FOUND);
        }
    
        $Schoolexpense->amount = $request->input('amount');
        $Schoolexpense->reason = $request->input('reason');
        $Schoolexpense->expense_date = $request->input('expense_date');
        $Schoolexpense->note = $request->input('note');
        $isSaved = $Schoolexpense->update();
    
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
    public function destroy(Schoolexpense $Schoolexpense)
    {
        $Schoolexpense->delete();
    }
}
