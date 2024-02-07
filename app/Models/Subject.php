<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function classes()
    {
        return $this->belongsToMany(ClassSubject::class, 'class_subjects');
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withPivot('full_marks');
    }
    public function studentExams()
    {
        return $this->belongsToMany(Exam::class, 'exam_subject_student')->withPivot('obtained_marks')->withTimestamps();
    }

}
