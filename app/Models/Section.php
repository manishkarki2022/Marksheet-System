<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
