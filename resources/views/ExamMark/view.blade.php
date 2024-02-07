@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Add Marks</h2>

        @if(request()->has('exam_id'))
            <p>Exam Type: {{ $exam->name }}</p>

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
        @else
            {{-- Display Dropdown for Exam Type if 'exam_id' is not in the request --}}
            <form method="post" action="{{ route('marks.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exam_id">Select Exam:</label>
                    <select name="exam_id" class="form-control">
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Rest of your form --}}
                {{-- Full Marks and Pass Marks Input --}}
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
        @endif
    </div>
@endsection
