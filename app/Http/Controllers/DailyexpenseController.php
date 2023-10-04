<?php

namespace App\Http\Controllers;

use App\Models\Dailyexpense;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DailyexpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailyexpenses = Dailyexpense::all();
        return response()->view('cms.dailyexpense.index', compact('dailyexpenses'));
    }
    public function indexInputs()
    {
        $dailyexpenses = Dailyexpense::all();
        return response()->view('cms.dailyexpense.indexInputs', compact('dailyexpenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.dailyexpense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'type' => 'required|string|in:inputs,expenses',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'reason_exchange' => 'required|string',

        ], [
            'amount.required' => 'رقم الهوية مطلوب',
            'amount.numeric' => 'رقم الهوية يجب أن يكون رقمًا',
            'date.required' => 'تاريخ المصروف مطلوب',
            'date.date' => 'تاريخ المصروف يجب أن يكون تاريخًا صحيحًا',
            'type.required' => 'نوع الدخل مطلوب',
            'type.in' => 'نوع الدخل غير صحيح',
        ]);
        if (!$validator->fails()) {
            $dailyexpense = new Dailyexpense();
            $dailyexpense->type = $request->input('type');
            $dailyexpense->amount = $request->input('amount');
            $dailyexpense->date = $request->input('date');
            $dailyexpense->reason_exchange = $request->input('reason_exchange');
            $isSaved = $dailyexpense->save();
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
    public function show(Dailyexpense $dailyexpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dailyexpense $dailyexpense)
    {
        return response()->view('cms.dailyexpense.edit' , compact('dailyexpense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dailyexpense $dailyexpense)
    {
        $validator = Validator($request->all(), [
            'type' => 'required|string|in:inputs,expenses',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'reason_exchange' => 'required|string',

        ], [
            'amount.required' => 'رقم الهوية مطلوب',
            'amount.numeric' => 'رقم الهوية يجب أن يكون رقمًا',
            'date.required' => 'تاريخ المصروف مطلوب',
            'date.date' => 'تاريخ المصروف يجب أن يكون تاريخًا صحيحًا',
            'type.required' => 'نوع الدخل مطلوب',
            'type.in' => 'نوع الدخل غير صحيح',
        ]);
        if (!$validator->fails()) {
            $dailyexpense->type = $request->input('type');
            $dailyexpense->amount = $request->input('amount');
            $dailyexpense->date = $request->input('date');
            $dailyexpense->reason_exchange = $request->input('reason_exchange');
            $isSaved = $dailyexpense->save();
            if ($isSaved) {
                return response()->json([
                    'message' => 'تم التعديل بنجاح',
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
    public function destroy(Dailyexpense $dailyexpense)
    {
        $dailyexpense->delete();
    }
    // Delete All ---
    public function deleteByType(Request $request)
    {
        $type = $request->input('type');
        Dailyexpense::where('type', $type)->delete();

        return redirect()->back()->with('success', 'تم حذف العناصر بنجاح');
    }
}
