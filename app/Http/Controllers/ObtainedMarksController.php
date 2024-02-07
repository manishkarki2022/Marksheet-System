<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObtainedMarksController extends Controller
{
    public function create()
    {
        if (request()->has('section_id')) {
            $section = Section::find(request('section_id'));
            $exams = Exam::all();
            $students = $section->students;
            $subjects = $section->studentClass->subjects;

            return view('obtainedmark.create', compact('students', 'subjects', 'exams'));
        }


    }
    public function store(Request $request)
    {
        $obtainedMarks = $request->input('obtained_marks');
        $examId = $request->input('exam_id');

        foreach ($obtainedMarks as $studentId => $subjects) {
            foreach ($subjects as $subjectId => $marks) {
                DB::table('exam_subject_student')->insert([
                    'exam_id' => $examId,
                    'subject_id' => $subjectId,
                    'student_id' => $studentId,
                    'obtained_marks' => $marks,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Redirect back or do other actions as needed
        return redirect()->back()->with('success', 'Obtained marks saved successfully.');
    }


}
