@extends('layout.dashboard')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-md">
        <div class="p-4">
            <h2 class="text-3xl font-semibold mb-2">Student Information</h2>
            <p class="text-gray-600 font-bold text-2xl">Name: {{$student->name}}</p>
            <p class="text-gray-600 text-" >CLass: {{$student->StudentClass->name}}</p>
            <p class="text-gray-600">Section {{$student->sections->name}}</p>
        </div>


        <form action="{{route('marksheet.view')}}" >
            @csrf
            <div class="p-4 bg-gray-100">
                <input type="hidden" name="student_id" value="{{ $student->id }}">

                <select name="exam_id" id="examSelect" class="w-full p-2 border border-gray-300 rounded-md mb-1">
                    <option value="">Select Exam</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->id }}</option>
                    @endforeach
                </select>

                <button class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>
        </form>

    </div>
@endsection

