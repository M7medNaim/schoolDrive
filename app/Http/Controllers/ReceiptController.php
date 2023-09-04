<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Receipt::all();
        return response()->view('cms.receipt.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $receipts = Receipt::all();
        return response()->view('cms.receipt.create', compact('students' ,'receipts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studentId = $request->input('student_id');
        $existingReceipt = Receipt::where('student_id', $studentId)->first();
        if ($existingReceipt) {
            return response()->json([
                'message' => 'الطالب قد دفع الرسوم مسبقًا',
            ], Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator($request->all(), [
            'test_receipt' => 'required',
            'signals_receipt' => 'required',
            'registration_receipt' => 'required',
            'program_receipt' => 'required',
            'student_id' => 'required|exists:students,id',
        ], [
            'test_receipt.required' => 'حقل وصل الاختبار مطلوب',
            'signals_receipt.required' => 'حقل وصل الإشارات مطلوب',
            'registration_receipt.required' => 'حقل وصل التسجيل مطلوب',
            'program_receipt.required' => 'حقل وصل البرنامج مطلوب',
            'student_id.required' => 'يجب اضافة الطالب',
            'student_id.exists' => 'الطالب غير موجود',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
        $receipt = new Receipt();
        $receipt->test_receipt = $request->input('test_receipt');
        $receipt->signals_receipt = $request->input('signals_receipt');
        $receipt->registration_receipt = $request->input('registration_receipt');
        $receipt->program_receipt = $request->input('program_receipt');
        $receipt->student_id = $studentId;
    
        if ($receipt->save()) {
            return response()->json([
                'message' => 'تم التخزين بنجاح',
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'هناك مشكلة في التخزين',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        $students = Student::all();
        return response()->view('cms.receipt.edit', compact('receipt', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipt $receipt)
    {
        $validator = Validator($request->all(), [
            'test_receipt' => 'required',
            'signals_receipt' => 'required',
            'registration_receipt' => 'required',
            'program_receipt' => 'required',
            'student_id' => 'required|exists:students,id',
        ], [
            'test_receipt.required' => 'حقل وصل الاختبار مطلوب',
            'signals_receipt.required' => 'حقل وصل الإشارات مطلوب',
            'registration_receipt.required' => 'حقل وصل التسجيل مطلوب',
            'program_receipt.required' => 'حقل وصل البرنامج مطلوب',
            'student_id.required' => 'يجب اضافة اسم الطالب',
            'student_id.exists' => 'الطالب غير موجود',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
        $receipt->test_receipt = $request->input('test_receipt');
        $receipt->signals_receipt = $request->input('signals_receipt');
        $receipt->registration_receipt = $request->input('registration_receipt');
        $receipt->program_receipt = $request->input('program_receipt');
        $receipt->student_id = $request->input('student_id');
    
        if ($receipt->save()) {
            return response()->json([
                'message' => 'تم التخزين بنجاح',
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'هناك مشكلة في التخزين',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipt $receipt)
    {
        $receipt->delete();
    }
}
