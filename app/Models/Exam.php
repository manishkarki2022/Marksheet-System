<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'full_marks')->withPivot('full_marks', 'pass_marks');
    }

    // New relationship with the exam_subject_student pivot table
    public function students()
    {
        return $this->belongsToMany(Student::class, 'exam_subject_student')->withPivot('obtained_marks')->withTimestamps();
    }

    // Additional relationship with subjects for the new pivot table
    public function subjectsForStudents()
    {
        return $this->belongsToMany(Subject::class, 'exam_subject_student')->withPivot('obtained_marks')->withTimestamps();
    }
}

