<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->has('sectionId')) {

            $section = Section::find(request('sectionId'));


               $class = $section->studentClass;

               $students = Student::where('student_class_id', $class->id)
                   ->where('section_id', $section->id)
                   ->get();
               return view('section.index', compact('class', 'section', 'students'));



        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {


        $class = StudentClass::find($id);

        // Fetch subjects for the selected class_id
        $subjects = $class->subjects;

        // You can fetch any other data you need

        return view('section.create', compact('class', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'section'=>'required|string|max:255',
        ]);

            $section = new Section();
            $section->name = $request->section;
            $section->student_class_id = $request->class_id;
            $section->save();
            return redirect()->route('class.show', $request->class_id);
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
        $section = Section::find($id);
        $section->delete();
        return redirect()->back();
    }
}
