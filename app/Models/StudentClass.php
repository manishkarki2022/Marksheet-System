<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function subjects(){
        return $this->belongsToMany(Subject::class,'class_subjects');
    }
}
