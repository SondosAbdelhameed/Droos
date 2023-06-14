<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Models\Attendance;
use App\Models\Classe;
use App\Models\Group;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::paginate(config('admin.pagination'));
        return view('admin.classes.index', compact('groups'));
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
        // return $request;
        
        $last_class = Classe::where('group_id', $request->group_id)->latest('id')->first();
        if($last_class->closed_at == null){
            return redirect()->route('classes.show', $last_class->id);
        }else{
            $class = new Classe();
            $class->group_id = $request->group_id;
            $class->save();
            $class_id = $class->id;
            return redirect()->route('classes.show', $class_id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classe::find($id);
        $students = Attendance::where('class_id', $id)->get();
        return view('admin.classes.attendance-create', compact('id', 'class','students'));
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
    public function endClass($id)
    {
        $class = Classe::find($id);
        $class->update(['closed_at' => now()]);
        return redirect()->route('classes.index')->with('success', 'تم غلق الحصة بنجاح');
    }
}