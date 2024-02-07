@extends('layout.dashboard')

@section('content')

    <div class="container mx-auto p-8 mt-8 bg-white shadow-lg rounded-md">
        <h1 class="text-3xl font-bold mb-6">Student Marksheet</h1>

        <!-- Student Information -->
        <div class="mb-4">
            <p class="text-lg font-semibold">Student Information:</p>
            <p><span class="font-bold">Name:</span> {{$student->name}}</p>
            <p><span class="font-bold">Class:</span> {{$student->studentClass->name}}</p>
            <p><span class="font-bold">Section:</span> {{$student->sections->name}}</p>
        </div>

        <!-- Exam Information -->
        <div class="mb-4">
            <p class="text-lg font-semibold">Exam Information:</p>
            <p><span class="font-bold">Exam Name:</span> {{$exam->name}}</p>
        </div>

        <!-- Subject-wise Marks -->
        <table class="w-full mb-8">
            <thead>
            <tr>
                <th class="py-2">Subject</th>
                <th class="py-2">Full Marks</th>
                <th class="py-2">Pass Marks</th>
                <th class="py-2">Obtained Marks</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjectsMarks as $subjectMark)
                <tr>
                    <td class="py-2">{{ $subjectMark->subject_name }}</td>
                    <td class="py-2">{{ $subjectMark->full_marks }}</td>
                    <td class="py-2">{{ $subjectMark->pass_marks }}</td>
                    <td class="py-2 o_marks">{{ $subjectMark->obtained_marks }}</td>
                </tr>
            @endforeach




            </tbody>
        </table>

        <!-- Total and Percentage -->
        <div>
            <p class="text-lg font-semibold">Total and Percentage:</p>
            <p><span class="font-bold totalMarks">Total Marks: </span>{{ $subjectsMarks->sum('obtained_marks') }} </p>

            <p><span class="font-bold">Percentage:</span> {{ number_format(($subjectsMarks->sum('obtained_marks') /$subjectsMarks->sum('full_marks') ) * 100, 2) }}%</p>

        </div>
    </div>
    <script>

    </script>



@endsection


