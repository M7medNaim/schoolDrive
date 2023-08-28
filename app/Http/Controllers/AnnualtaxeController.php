<?php

namespace App\Http\Controllers;

use App\Models\Annualtaxe;
use App\Models\Monthlytaxe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnnualtaxeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annualtaxes = Annualtaxe::all();
        return response()->view('cms.annualtaxe.index', compact('annualtaxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.annualtaxe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'taxe_year' => 'required|numeric',
            'amount' => 'required|numeric',
        ], [
            'taxe_year.required' => 'يجب إدخال سنة الضريبة',
            'taxe_year.date' => 'تاريخ انتهاء الضريبة غير صحيح',
            'amount.required' => 'يجب إدخال مبلغ الضريبة',
            'amount.numeric' => 'مبلغ الضريبة يجب أن يكون رقمًا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $annualtaxe = new Annualtaxe();
        $annualtaxe->taxe_year = $request->input('taxe_year');
        $annualtaxe->amount = $request->input('amount');
        $isSaved = $annualtaxe->save();

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
    public function show(Annualtaxe $annualtaxe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annualtaxe $annualtaxe)
    {
        return response()->view('cms.annualtaxe.edit', compact('annualtaxe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annualtaxe $annualtaxe)
    {

        $validator = Validator($request->all(), [
            'taxe_year' => 'required|date',
            'amount' => 'required|numeric',
        ], [
            'taxe_year.required' => 'يجب إدخال سنة الضريبة',
            'taxe_year.date' => 'تاريخ انتهاء الضريبة غير صحيح',
            'amount.required' => 'يجب إدخال مبلغ الضريبة',
            'amount.numeric' => 'مبلغ الضريبة يجب أن يكون رقمًا',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        if (!$annualtaxe) {
            return response()->json([
                'message' => 'الضريبة غير موجودة'
            ], Response::HTTP_NOT_FOUND);
        }

        $annualtaxe->taxe_year = $request->input('taxe_year');
        $annualtaxe->amount = $request->input('amount');
        $isSaved = $annualtaxe->update();

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
     * 
     */
    public function destroy($id)
    {
        dd($id);
        
        $annualtaxe = Annualtaxe::findOrFail($id);
        try {
            $annualtaxe->delete();
            return response()->json([
                'status'=> true ,
                'message' => 'success delete'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'=> false ,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function viewmonthlytaxes(Annualtaxe $annualtaxe)
    {
        $monthlytaxes = Monthlytaxe::where('annualtaxe_id', $annualtaxe->id)->get();
        return view('cms.annualtaxe.viewmonthlytaxes', compact('monthlytaxes', 'annualtaxe'));
    }
}
