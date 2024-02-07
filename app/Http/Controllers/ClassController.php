<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Subject;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Classes';
        $classes = StudentClass::all();
        return view('Class.index', compact('classes', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::orderBy('name')->get();
//        dd( $subjects);

        return view('Class.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'class' => 'required|string|max:255',
            'class.*' => 'exists:subjects,id',

            'subjects' => 'required|array|min:1', // Ensure at least one subject is selected
            'subjects.*' => 'exists:subjects,id', // Ensure each selected subject exists
        ]);

        // Create the class
        $class = StudentClass::create([
            'name' => $request->class,
        ]);

        $class->subjects()->attach($request->subjects);
        // Attach subjects to the class


        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = StudentClass::with('sections', 'subjects')->find($id);

        return view('class.view', compact('class'));
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
        //
    }
}
