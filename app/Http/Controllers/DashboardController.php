<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Course;
use App\Models\Group;
use App\Models\Level;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::count();
        $groups = Group::count();
        $levels = Level::count();
        $courses = Course::count();
        $classes = Classe::count();
        return view('admin.dashboard', compact('students', 'groups', 'levels', 'courses', 'classes'));
    }
}