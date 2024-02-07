@extends('layout.dashboard')

@section('content')
    <div class="container">
        @if(request()->has('class_id'))
        <h2 class="mb-4">Add Student</h2>
        @endif

        @if(request()->has('section_id'))
            <h3>For Section : {{$section->name}}</h3>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')'
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="roll_number" class="form-label">Roll Number</label>
                <input type="text" class="form-control" id="roll_number" name="roll_number" required>
                @error('roll_number')'
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            @if(request()->has('class_id'))

                <div class="mb-3">
                    <label for="class_id" class="form-label">Class</label>
                    <input type="text" class="form-control" value="{{ $class->name }}" readonly>

                    <input type="hidden" name="class_id" value="{{ $class->id }}">
                </div>
            @else
            {{--this create student without, class_id and section_id in request--}}
                <div>
                    <label for="classDropdown">Select Class:</label>
                    <select id="classDropdown" name="class_id">
                        <option value="">Select a class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>

                        @endforeach
                    </select>

                    <br>
                    <div class="section_dropdown_container hidden">
                        <label for="sectionDropdown">Select Section:</label>
                        <select id="sectionDropdown" name="section_id">
                        </select>
                    </div>
                    <div class="no_sections_found text-red-600 hidden">
                        <p>No sections found for this class</p>
                    </div>
                </div>
{{--               add section if class_id and section_id is not present--}}
            @endif

            @if(request()->has('section_id'))

                <div class="mb-3">
                    <label for="section_id" class="form-label">Section</label>
                    <input type="text" class="form-control" value="{{ $section->name }}" readonly>
                    <input type="hidden" name="section_id" value="{{ $section->id }}">
                </div>
            @elseif(request()->has('class_id'))
                {{-- If class_id is present, show the dropdown to choose Section based on Class --}}
                <div class="mb-3">
                    <label for="section_id" class="form-label">Select Section</label>


                    <select class="form-select" id="section_id" name="section_id" required>


                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')'
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endif



            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
@endsection

