<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return response()->view('cms.payment.index' ,compact('payments') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return response()->view('cms.payment.create' , compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'student_id' => 'required|exists:students,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
        ], [
            'student_id.required' => 'يجب اختيار الطالب',
            'student_id.exists' => 'الطالب غير موجود',
            'payment_date.required' => 'تاريخ الدفعة مطلوب',
            'payment_date.date' => 'تاريخ الدفعة غير صحيح',
            'amount.required'=>'يجب ادخال المبلغ',
            'amount.numeric'=>'المبلغ يجب ان يكون رقم',
        ]);
        if (!$validator->fails()) {
            $payment = new payment();
            $payment->student_id = $request->input('student_id');
            $payment->amount = $request->input('amount');
            $payment->payment_date = $request->input('payment_date');
            $isSaved = $payment->save();
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $students = Student::all();
        return response()->view('cms.payment.edit' , compact('payment' , 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validator = Validator($request->all(), [
            'student_id' => 'required|exists:students,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
        ], [
            'student_id.required' => 'يجب اختيار الطالب',
            'student_id.exists' => 'الطالب غير موجود',
            'payment_date.required' => 'تاريخ الدفعة مطلوب',
            'payment_date.date' => 'تاريخ الدفعة غير صحيح',
            'amount.required'=>'يجب ادخال المبلغ',
            'amount.numeric'=>'المبلغ يجب ان يكون رقم',
        ]);
    
        if (!$validator->fails()) {
    
            if ($payment) {
                $payment->student_id = $request->input('student_id');
                $payment->amount = $request->input('amount');
                $payment->payment_date = $request->input('payment_date');
                $isSaved = $payment->save();
    
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
    public function destroy(Payment $payment)
    {
        $payment->delete();
    }
}
