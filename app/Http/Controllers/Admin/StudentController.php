<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Level;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(config('admin.pagination'));
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::get();
        return view('admin.students.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student();
        $student->barcode = rand(1000, 100000);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->group_id = $request->group_id;
        if (request()->photo) {
            $student->photo = $this->save_image($request->photo, $student->image);
        }
        $student->save();
        return redirect()->route('students.index')->with('success', 'Added Successfully');
    }
    public function save_image($filename ,$path)
    {
        $file = time().'.'.$filename->getClientOriginalExtension();
            request()->photo->move(public_path($path), $file);
        return $file;
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
    public function edit(Student $student)
    {
        $groups = Group::get();
        return view('admin.students.edit', compact('student', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->group_id = $request->group_id;
        if (request()->photo) {
            $student->photo = $this->save_image($request->photo, $student->image);
        }
        $student->save();
        return redirect()->route('students.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Deleted Successfully');
    }
    public function printBarcode($id){
		$student = Student::find($id);
		return view('admin.students.barcode',compact('student'));
	}
}