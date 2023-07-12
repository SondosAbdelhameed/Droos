<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\Level;
use DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $levels = Level::get();
        $courses = Course::get();
        $groups = Group::get();
        $invoices = Invoice::with('student');
        if (isset($request->from) && isset($request->to))
            $invoices = $invoices->whereBetween(DB::raw('DATE(created_at)'), [$request->from, $request->to]);
        if(isset($request->level_id))
            $invoices = $invoices->whereHas('student', function($query) use($request){
                    $query->where('level_id', $request->level_id);
                });
        if(isset($request->course_id))
            $invoices = $invoices->whereHas('group', function($query) use($request){
                    $query->where('course_id', $request->course_id);
                });
        if (isset($request->group_id))
            $invoices->where('group_id', $request->group_id);
        $invoices = $invoices->paginate(config('admin.pagination'));
        $sum = $invoices->sum('price');
        return view('admin.invoices.index', compact('invoices', 'sum', 'levels', 'courses','groups'));
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