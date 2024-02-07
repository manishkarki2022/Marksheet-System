<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $pageTitle = 'Students';
    $search = $request->get('search');

    $query = Student::query();

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%')
            ->orWhereHas('studentClass', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('sections', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
    }

    // Sorting logic
    $sortField = $request->get('sort', 'name');
    $sortDirection = $request->get('direction', 'asc');
    $query->orderBy($sortField, $sortDirection);

    $students = $query->get();

    return view('student.index', compact('students', 'pageTitle'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (request()->has('class_id') && !request()->has('section_id')) {
            $class = StudentClass::find(request('class_id'));
            $sections = $class->sections;
            return view('Student.create', compact('class', 'sections'));
        }



        // Check if section_id is present in the route
        if (request()->has('class_id') && request()->has('section_id')) {
            $section = Section::find(request('section_id'));
            $class = $section->studentClass;
            $sections = $class->sections;
            return view('student.create', compact('class', 'section', 'sections'));
        }

        // If no class_id or section_id, fetch all classes and sections
        $classes = StudentClass::all();
        $sections = Section::all();

        return view('student.create', compact('classes', 'sections'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required|string|max:255',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->student_class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
         $exams = Exam::all();
        return view('student.view', compact('student','exams'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
