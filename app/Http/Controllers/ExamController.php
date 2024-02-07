<?php

namespace App\Http\Controllers;

use App\Models\Exam;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Exams';
        $exams = Exam::all();
        return view('Exam.index', compact('exams', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Exam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam' => 'required',
        ]);
        $checkExam = Exam::get();

        foreach ($checkExam as $exam) {
            if ($exam->name == $request->exam) {
                notify()->warning('Exam already exists');
                return redirect()->route('exams.index');
            }
        }
        $exam = new Exam();
        $exam->name = $request->exam;
        $exam->save();
        notify()->success('Exam added successfully');
        return redirect()->route('exams.index');
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
        //
    }
}
