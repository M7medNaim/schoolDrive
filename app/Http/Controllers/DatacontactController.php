<?php

namespace App\Http\Controllers;

use App\Models\Datacontact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatacontactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datacontacts = Datacontact::all();
        return response()->view('cms.datacontact.index', compact('datacontacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.datacontact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ], [
            'name.required' => 'يرجى إدخال الاسم',
            'name.string' => 'الاسم يجب أن يكون نصيًا',
            'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرفًا',
            'phone.required' => 'يرجى إدخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون رقمًا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $datacontact = new Datacontact();
        $datacontact->name = $request->input('name');
        $datacontact->phone = $request->input('phone');
        $isSaved = $datacontact->save();

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
    public function show(Datacontact $datacontact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datacontact $datacontact)
    {
        return response()->view('cms.datacontact.edit', compact('datacontact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datacontact $datacontact)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ], [
            'name.required' => 'يرجى إدخال الاسم',
            'name.string' => 'الاسم يجب أن يكون نصيًا',
            'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرفًا',
            'phone.required' => 'يرجى إدخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف يجب أن يكون رقمًا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $datacontact->name = $request->input('name');
        $datacontact->phone = $request->input('phone');
        $isSaved = $datacontact->save();

        if ($isSaved) {
            return response()->json([
                'message' => 'تم التحديث بنجاح',
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'هناك مشكلة في التحديث'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datacontact $datacontact)
    {
        $datacontact->delete();
    }
}
