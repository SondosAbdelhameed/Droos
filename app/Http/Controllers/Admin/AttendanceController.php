<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\SaveInvoice;
use App\Models\Attendance;
use App\Models\Classe;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\MonthlyLevelPrice;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
class AttendanceController extends Controller
{
    use SaveInvoice;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::where('barcode', $request->barcode)->first();
        $student_group = StudentGroup::where('student_id', $student->id)->where('group_id', $request->group_id)->first();
        if($student_group !==null)
        {
             $student_existe = Attendance::where('student_id', $student_group->id)->where('class_id', $request->class_id)->first();
            if($student_existe ==null)
            {
                if ($student_group->end_date == null && $student_group->end_date <= now() )
                {
                    return redirect()->back()->with(['paymentshowdialog'=> 'not paid', 'student_id' => $student_group->id, 'class_id' => $request->class_id, 'group_id' => $request->group_id ]);
                }else{
                    Attendance::create(['student_id' => $student_group->id, 'class_id' => $request->class_id]);
                    return redirect()->back()->with('success', 'Added Successfully');
                }
            }elseif($student_existe !==null){
                return redirect()->back()->with('warning', 'هذا الطالب مسجل بالفعل');
            }
        }
        else{
            return redirect()->back()->with('error', ' هذا الطالب غير مسجل بالمجموعه ');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.classes.attendance-create', compact('id'));
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
    public function destroy(Course $course)
    {
        //
    }
    public function attendAndSkip(Request $request)
    {
        $student = StudentGroup::where('student_id', $request->student_id)->where('group_id', $request->group_id)->first();
        Attendance::create(['student_id' => $student->id, 'class_id' => $request->class_id]);
        // increase value for student class
        $student->dept_class_no = $student->dept_class_no + 1;
        $student->save();
        return redirect()->back()->with('success', 'Added Successfully');
    }
    public function payAndAttend(Request $request)
    {
        // return $request;
        $class = Classe::where('id', $request->class_id)->with('group')->first();
        $one_price = $class->group->level->one_price;
        $level = $class->group->level->id;
        $month_level = MonthlyLevelPrice::where('level_id', $level)->latest('id')->first();
        $month_price = $month_level->price;
        $month_end_date = $month_level->end_date;
     return redirect()->back()->with(['payment'=> 'paid', 'student_id' => $request->student_id, 'class_id' => $request->class_id , 'group_id' => $request->group_id, 'one_price' => $one_price, 'month_price' => $month_price, 'month_end_date' => $month_end_date]);
    }
    public function payPerClass(Request $request)
    {
        // return $request;
        $student = Student::find($request->student_id);
        Attendance::create(['student_id' => $student->id, 'class_id' => $request->class_id]);
        // update end date 
        $student_group = StudentGroup::where('student_id', $student->id)->where('group_id', $request->group_id)->update(['end_date' => now()]);
        //save invoice
        $class = Classe::where('id', $request->class_id)->with('group')->first();
        $one_price = $class->group->level->one_price;
        $this->saveInvoice($student->id, $request->group_id, 1, $one_price);
        return redirect()->back()->with('success', 'Added Successfully');
    }
    public function payPerMonth(Request $request)
    {
        $student = Student::find($request->student_id);
        Attendance::create(['student_id' => $student->id, 'class_id' => $request->class_id]);
        // update end date 
        $student_group = StudentGroup::where('student_id', $student->id)->where('group_id', $request->group_id)->update(['end_date' => $request->end_date]);
        //save invoice
        $class = Classe::where('id', $request->class_id)->with('group')->first();
        $level = $class->group->level->id;
        $month_level = MonthlyLevelPrice::where('level_id', $level)->latest('id')->first();
        $month_price = $month_level->price;
        $this->saveInvoice($student->id, $request->group_id, 2, $month_price);
        return redirect()->back()->with('success', 'Added Successfully');
    }
    
}