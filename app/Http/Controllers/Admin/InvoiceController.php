<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $invoice = Invoice::paginate(config('admin.pagination'));
        if (isset($request->from) && isset($request->to)) {
            $invoices = Invoice::where('created_at', '>=', $request->from)->where('created_at', '<=', $request->to)->paginate(config('admin.pagination'));
        }else{
            $invoices = Invoice::paginate(config('admin.pagination'));
        }
        $sum = $invoices->sum('price');
        return view('admin.invoices.index', compact('invoices', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}