@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Enter Obtained Marks</h2>

    <form action="{{ route('Obtainedmarks.store') }}" method="POST">
            @csrf
            <input type="hidden" name="section_id" value="{{ request('section_id') }}">
            <select name="exam_id" id="exam_id">
                <option value="">Select Exam Type</option>
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                @endforeach
            </select>

            <table class="table">
                <thead>
                <tr>
                    <th>Student Name</th>
                    @foreach($subjects as $subject)
                        <th>{{ $subject->name }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        @foreach($subjects as $subject)
                            <td>
                                <input type="number" name="obtained_marks[{{ $student->id }}][{{ $subject->id }}]" min="0" max="100">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Save Obtained Marks</button>
        </form>
    </div>
@endsection
