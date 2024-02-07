<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class MarksheetController extends Controller
{
    public function view(Request $request)
    {
        $student = Student::find($request->student_id);
        $exam = Exam::find($request->exam_id);


        $subjectsMarks = $student->exams()
            ->where('student_id', $student->id)
            ->where('exam_id', $exam->id)
            ->select('subject_id', 'obtained_marks')
            ->get();

        foreach ($subjectsMarks as & $subjectMark) {
            $subjectId = $subjectMark['subject_id'];

            $examSubject = $exam->subjects()
                ->wherePivot('subject_id', $subjectId)
                ->first();

            $subjectMark['full_marks'] = $examSubject->pivot->full_marks;
            $subjectMark['pass_marks'] = $examSubject->pivot->pass_marks;
            $subjectMark['subject_name'] = $examSubject->name;
        }


        return view('marksheet.view', compact('student', 'exam', 'subjectsMarks'));




    }
}
