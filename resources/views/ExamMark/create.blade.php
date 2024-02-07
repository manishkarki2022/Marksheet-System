@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Add Marks</h2>
        <form method="post" action="{{ route('marks.store') }}">
            @csrf

            {{-- Display Exam Type if 'exam_id' is available in the request --}}
            @if(request()->has('exam_id'))
                <input type="hidden" name="exam_id" value="{{ request('exam_id') }}">
                <p>Exam Type: {{ $exam->name }}</p>
            @else
                {{-- Display Dropdown for Exam Type if 'exam_id' is not in the request --}}
                <div class="form-group">
                    <label for="exam_id">Select Exam:</label>
                    <select name="exam_id" class="form-control">
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            {{-- Display Subjects in Table Form --}}
            <table class="table">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th>Full Marks</th>
                    <th>Pass Marks</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <input type="text" name="marks[{{ $subject->id }}][Full_marks]" class="form-control" required>
                        </td>
                        <td>
                            <input type="text" name="marks[{{ $subject->id }}][Pass_marks]" class="form-control" required>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Add Marks</button>
        </form>
    </div>
@endsection
