<?php

namespace App\Http\Controllers;

use App\Models\AdvanceOfPay;
use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->view('cms.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'salary' => 'required|numeric',
        ], [
            'name.required' => 'يجب إدخال اسم الطالب',
            'id_number.required' => 'يجب إدخال رقم الهوية',
            'id_number.numeric' => 'يجب أن يحتوي رقم الهوية على أرقام فقط',
            'phone.required' => 'يجب إدخال رقم الجوال',
            'phone.numeric' => 'يجب أن يحتوي رقم الجوال على أرقام فقط',
            'salary.required' => 'يجب إدخال الراتب',
            'salary.numeric' => 'يجب أن يكون الراتب قيمة رقمية',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->salary = $request->input('salary');
        $oldIdNumber = $employee->id_number;

        if ($oldIdNumber != $request->input('id_number')) {
            $idNumberValidator = Validator($request->all(), [
                'id_number' => 'required|unique:employees,id_number'
            ], [
                'id_number.required' => 'رقم الهوية مطلوب',
                'id_number.unique' => 'رقم الهوية مستخدم بالفعل'
            ]);

            if ($idNumberValidator->fails()) {
                return response()->json([
                    'message' => $idNumberValidator->errors()->first()
                ], Response::HTTP_BAD_REQUEST);
            }

            $employee->id_number = $request->input('id_number');
        }

        $isSaved = $employee->save();
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
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return response()->view('cms.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'salary' => 'required|numeric',
        ], [
            'name.required' => 'يجب إدخال اسم الطالب',
            'id_number.required' => 'يجب إدخال رقم الهوية',
            'id_number.numeric' => 'يجب أن يحتوي رقم الهوية على أرقام فقط',
            'phone.required' => 'يجب إدخال رقم الجوال',
            'phone.numeric' => 'يجب أن يحتوي رقم الجوال على أرقام فقط',
            'salary.required' => 'يجب إدخال الراتب',
            'salary.numeric' => 'يجب أن يكون الراتب قيمة رقمية',
        ]);

        if (!$validator->fails()) {

            if ($employee) {
                $employee->name = $request->input('name');
                $employee->phone = $request->input('phone');
                $employee->salary = $request->input('salary');
                $oldIdNumber = $employee->id_number;
                if ($oldIdNumber != $request->input('id_number')) {
                    $idNumberValidator = Validator($request->all(), [
                        'id_number' => 'required|unique:employees,id_number'
                    ], [
                        'id_number.required' => 'رقم الهوية مطلوب',
                        'id_number.unique' => 'رقم الهوية مستخدم بالفعل'
                    ]);
            
                    if ($idNumberValidator->fails()) {
                        return response()->json([
                            'message' => $idNumberValidator->errors()->first()
                        ], Response::HTTP_BAD_REQUEST);
                    }
            
                    $employee->id_number = $request->input('id_number');
                }
                $isSaved = $employee->update();

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
    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
    // Advance of pay
    public function viewAdvanceOfPays(Employee $employee)
    {
        $AdvanceOfPays = AdvanceOfPay::where('employee_id', $employee->id)->get();
        return view('cms.employee.viewAdvanceOfPays', compact('AdvanceOfPays', 'employee'));
    }
}
