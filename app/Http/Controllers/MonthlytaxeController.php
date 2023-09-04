<?php

namespace App\Http\Controllers;

use App\Models\Annualtaxe;
use App\Models\Monthlytaxe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonthlytaxeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monthlytaxes = Monthlytaxe::all();
        return response()->view('cms.monthlytaxe.index', compact('monthlytaxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $annualtaxes = Annualtaxe::all();
        return response()->view('cms.monthlytaxe.create', compact('annualtaxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'annualtaxe_id' => 'required|exists:annualtaxes,id',
            'amount' => 'required|numeric',
            'taxe_day_month' => 'required|string',
            'taxe_month' => 'required|numeric|between:1,12',
        ], [
            'annualtaxe_id.required' => 'يجب إدخال الضريبة السنوية',
            'annualtaxe_id.exists' => ' الضريبة السنوية غير موجودة',
            'amount.required' => 'يجب إدخال المبلغ',
            'amount.numeric' => 'المبلغ يجب أن يكون قيمة رقمية',
            'taxe_day_month.required' => 'يجب إدخال اليوم والشهر',
            'taxe_month.required' => 'يجب إدخال الشهر',
            'taxe_month.numeric' => 'الشهر يجب أن يكون قيمة رقمية',
            'taxe_month.between' => 'يجب ادخال شهر صحيح',
            'taxe_month.max' => 'الشهر يجب ألا يتجاوز رقمين',
            'taxe_month.min' => 'الشهر يجب أن يكون على الأقل رقم واحد',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $monthlytaxe = new Monthlytaxe();
        $monthlytaxe->annualtaxe_id = $request->input('annualtaxe_id');
        $monthlytaxe->amount = $request->input('amount');
        $monthlytaxe->taxe_day_month = $request->input('taxe_day_month');
        $monthlytaxe->taxe_month = $request->input('taxe_month');
        $isSaved = $monthlytaxe->save();

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
    public function show(Monthlytaxe $monthlytaxe)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $annualtaxes = Annualtaxe::all();
        $monthlytaxe = Monthlytaxe::findOrFail($id);
        return response()->view('cms.monthlytaxe.edit', compact('monthlytaxe', 'annualtaxes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'annualtaxe_id' => 'required|exists:annualtaxes,id',
            'amount' => 'required|numeric',
            'taxe_day_month' => 'required|string',
            'taxe_month' => 'required|numeric',
        ], [
            'annualtaxe_id.required' => 'يجب إدخال الضريبة السنوية',
            'annualtaxe_id.exists' => ' الضريبة السنوية غير موجودة',
            'amount.required' => 'يجب إدخال المبلغ',
            'amount.numeric' => 'المبلغ يجب أن يكون قيمة رقمية',
            'taxe_day_month.required' => 'يجب إدخال اليوم والشهر',
            'taxe_month.required' => 'يجب إدخال الشهر',
            'taxe_month.numeric' => 'الشهر يجب أن يكون قيمة رقمية',
            'taxe_month.max' => 'الشهر يجب ألا يتجاوز رقمين',
            'taxe_month.min' => 'الشهر يجب أن يكون على الأقل رقم واحد',
        ]);

        if (!$validator->fails()) {
            $monthlytaxe = Monthlytaxe::findOrFail($id);
            if ($monthlytaxe) {
                $monthlytaxe->annualtaxe_id = $request->input('annualtaxe_id');
                $monthlytaxe->amount = $request->input('amount');
                $monthlytaxe->taxe_day_month = $request->input('taxe_day_month');
                $monthlytaxe->taxe_month = $request->input('taxe_month');
                $isSaved = $monthlytaxe->update();
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
                    'message' => 'الضريبة الشهرية غير موجودة '
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
    public function destroy($id)
    {
        $monthlytaxe = Monthlytaxe::findOrFail($id);
        try {
            $monthlytaxe->delete();
            return response()->json([
                'status' => true,
                'message' => 'تم الحذف بنجاح '
            ], 204);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
