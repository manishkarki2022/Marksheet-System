<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(request()->has('exam_id')){
            $exam = Exam::with('subjects')->find(request('exam_id')) ;


            return view('ExamMark.index', compact('exam'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(request()->has('exam_id')){
            $exam = Exam::find(request('exam_id'));
            $subjects = Subject::all();
            return view('ExamMark.create', compact('exam', 'subjects'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(request()->has('exam_id')){
            $exam = Exam::find($request->exam_id);
            foreach ($request->marks as $subjectId => $marks) {
                $exam->subjects()->attach($subjectId, [
                    'full_marks' => $marks['Full_marks'],
                    'pass_marks' => $marks['Pass_marks'],
                ]);
            }

            return redirect()->route('exams.index');


        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


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
