<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return response()->view('cms.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return response()->view('cms.lesson.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'student_id' => 'required|exists:students,id',
            'lesson_date' => 'required|date',
        ], [
            'student_id.required' => 'يجب اختيار الطالب',
            'student_id.exists' => 'الطالب غير موجود',
            'lesson_date.required' => 'تاريخ الدرس مطلوب',
            'lesson_date.date' => 'تاريخ الدرس غير صحيح',
        ]);
        if (!$validator->fails()) {
            $lesson = new Lesson();
            $lesson->student_id = $request->input('student_id');
            $lesson->lesson_date = $request->input('lesson_date');
            $isSaved = $lesson->save();
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
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $students = Student::all();
        return response()->view('cms.lesson.edit', compact('lesson', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validator = Validator($request->all(), [
            'student_id' => 'required|exists:students,id',
            'lesson_date' => 'required|date',
        ], [
            'student_id.required' => 'يجب اختيار الطالب',
            'student_id.exists' => 'الطالب غير موجود',
            'lesson_date.required' => 'تاريخ الدرس مطلوب',
            'lesson_date.date' => 'تاريخ الدرس غير صحيح',
        ]);
    
        if (!$validator->fails()) {
    
            if ($lesson) {
                $lesson->student_id = $request->input('student_id');
                $lesson->lesson_date = $request->input('lesson_date');
                $isSaved = $lesson->save();
    
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
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
    }
}
