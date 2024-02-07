<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getSections($class_id)
    {
        $sections = Section::where('student_class_id', $class_id)->get();
        return response()->json($sections);
    }
}
