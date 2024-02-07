<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Subjects';
        $subjects = Subject::all();
        return view('Subject.index', compact('subjects', 'pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
        ]);
        $checkSubject = Subject::get();
        foreach ($checkSubject as $subject) {
            if ($subject->name == $request->subject) {
                notify()->warning('Subject already exists');
                return redirect()->route('subjects.index');
            }
        }
        $subject = new Subject();
        $subject->name = $request->subject;
        $subject->save();
        notify()->success('Subject added successfully');
        return redirect()->route('subjects.index');
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
        $subject = Subject::find($id);
        $subject->delete();
        notify()->success('Subject deleted successfully');
        return redirect()->route('subjects.index');
    }
}
