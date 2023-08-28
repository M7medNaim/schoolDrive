<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Lesson;
use App\Models\Payment;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('payments')->get();
        return response()->view('cms.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'student_name' => 'required|string',
            'id_number' => 'required|numeric|unique:students,id_number',
            'phone' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'agreed_amount' => 'required|numeric',
            'type_of_license' => 'required|string|in:ملاكي عادي,تجاري,ملاكي أتوماتيك',
            'number_of_examination' => 'required|string|in:1,2,3,4',
            'application' => 'required|string|in:شفوي,تحريري',
            'result' => 'required|string|in:لم يقدم,ناجح,راسب',
            'license_system' => 'required|string|in:بالدرس,مقاولة',

        ], [
            'student_name.required' => 'اسم الطالب مطلوب',
            'id_number.required' => 'رقم الهوية مطلوب',
            'id_number.numeric' => 'رقم الهوية يجب أن يكون رقمًا',
            'id_number.unique' => 'رقم الهوية مستخدم بالفعل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون رقمًا',
            'date_of_birth.required' => 'تاريخ الميلاد مطلوب',
            'date_of_birth.date' => 'تاريخ الميلاد يجب أن يكون تاريخًا صحيحًا',
            'agreed_amount.required' => 'المبلغ المتفق عليه مطلوب',
            'agreed_amount.numeric' => 'المبلغ المتفق عليه يجب أن يكون رقمًا',
            'type_of_license.required' => 'نوع الرخصة مطلوب',
            'type_of_license.in' => 'نوع الرخصة غير صحيح',
            'number_of_examination.required' => 'عدد الفحوصات مطلوب',
            'number_of_examination.in' => 'عدد الفحوصات غير صحيح',
            'application.required' => 'نوع التطبيق مطلوب',
            'application.in' => 'نوع التطبيق غير صحيح',
            'result.required' => 'نتيجة الطالب مطلوبة',
            'result.in' => 'نتيجة الطالب غير صحيحة',
            'license_system.required' => 'نظام الرخصة مطلوب',
            'license_system.in' => 'نظام الرخصة غير صحيح',
        ]);
        if (!$validator->fails()) {
            $student = new Student();
            $student->name = $request->input('student_name');
            $student->id_number = $request->input('id_number');
            $student->phone = $request->input('phone');
            $student->date_of_birth = $request->input('date_of_birth');
            $student->agreed_amount = $request->input('agreed_amount');
            $student->type_of_license = $request->input('type_of_license');
            $student->number_of_examination = $request->input('number_of_examination');
            $student->application = $request->input('application');
            $student->result = $request->input('result');
            $student->license_system = $request->input('license_system');
            $isSaved = $student->save();
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
    public function show(Student $student)
    {
        return response()->view('cms.student.show' , compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return response()->view('cms.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator($request->all(), [
            'student_name' => 'required|string',
            'phone' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'agreed_amount' => 'required|numeric',
            'type_of_license' => 'required|string|in:ملاكي عادي,تجاري,ملاكي أتوماتيك',
            'number_of_examination' => 'required|string|in:1,2,3,4',
            'application' => 'required|string|in:شفوي,تحريري',
            'result' => 'required|string|in:لم يقدم,ناجح,راسب',
            'license_system' => 'required|string|in:بالدرس,مقاولة',

        ], [
            'student_name.required' => 'اسم الطالب مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون رقمًا',
            'date_of_birth.required' => 'تاريخ الميلاد مطلوب',
            'date_of_birth.date' => 'تاريخ الميلاد يجب أن يكون تاريخًا صحيحًا',
            'agreed_amount.required' => 'المبلغ المتفق عليه مطلوب',
            'agreed_amount.numeric' => 'المبلغ المتفق عليه يجب أن يكون رقمًا',
            'type_of_license.required' => 'نوع الرخصة مطلوب',
            'type_of_license.in' => 'نوع الرخصة غير صحيح',
            'number_of_examination.required' => 'عدد الفحوصات مطلوب',
            'number_of_examination.in' => 'عدد الفحوصات غير صحيح',
            'application.required' => 'نوع التطبيق مطلوب',
            'application.in' => 'نوع التطبيق غير صحيح',
            'result.required' => 'نتيجة الطالب مطلوبة',
            'result.in' => 'نتيجة الطالب غير صحيحة',
            'license_system.required' => 'نظام الرخصة مطلوب',
            'license_system.in' => 'نظام الرخصة غير صحيح',
        ]);
        if (!$validator->fails()) {
            $student->name = $request->input('student_name');
            $oldIdNumber = $student->id_number;
            $student->phone = $request->input('phone');
            $student->date_of_birth = $request->input('date_of_birth');
            $student->agreed_amount = $request->input('agreed_amount');
            $student->type_of_license = $request->input('type_of_license');
            $student->number_of_examination = $request->input('number_of_examination');
            $student->application = $request->input('application');
            $student->result = $request->input('result');
            $student->license_system = $request->input('license_system');

            if ($oldIdNumber != $request->input('id_number')) {
                $validator = Validator($request->all(), [
                    'id_number' => 'required|unique:students,id_number'
                ], [
                    'id_number.required' => 'رقم الهوية مطلوب',
                    'id_number.unique' => 'هذا الرقم مستخدم بالفعل'
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->getMessageBag()->first()
                    ], Response::HTTP_BAD_REQUEST);
                }
                $student->id_number = $request->input('id_number');
            }
            $isUpdated = $student->update();
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
    public function destroy(Student $student)
    {
        $student->delete();
    }
    // students lessons

    public function viewLessons(Student $student)
    {
        $lessons = Lesson::where('student_id', $student->id)->get();
        return view('cms.student.view_lessons', compact('lessons', 'student'));
    }

    // students payment

    public function viewPayments(Student $student)
    {
        $payments = Payment::where('student_id', $student->id)->get();
        return view('cms.student.view_payments', compact('payments', 'student'));
    }
}