@extends('layout.dashboard')

@section('content')

    <div class="container">
        <h2>Exam Subjects and Marks</h2>
        @if(request()->has('exam_id'))
        <p>Exam Type: {{ $exam->name }}</p>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Full Marks</th>
                <th>Pass Marks</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($exam->subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->pivot->full_marks }}</td>
                    <td>{{ $subject->pivot->pass_marks }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
