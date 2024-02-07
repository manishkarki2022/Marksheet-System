<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_subject_student')
            ->withPivot('obtained_marks')
            ->withTimestamps();
    }



}
