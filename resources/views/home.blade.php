@extends('layout.dashboard')

@section('content')

    <div class="flex-1 overflow-x-hidden overflow-y-auto p-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

            <!-- Card for Student Information -->
            <div class="bg-white p-4 rounded-lg shadow-md card-animation  animate__animated animate__bounce">
                <h3 class="text-1xl font-semibold mb-4 ">Student Information</h3>
                <p>Total Number of Students: {{count($students)}}</p>
                <a href="{{route('students.index')}}">View</a>
                <!-- You can display other relevant student information here -->

            </div>
            <!-- Card for Class Information -->
            <div class="bg-white p-4 rounded-lg shadow-md card-animation animate__animated animate__bounce">
                <h3 class="text-1xl font-semibold mb-4 ">Class Information</h3>
                <p>Total Number of Classes:{{count($classes)}}</p>
                <a href="{{route('class.index')}}">View</a>
                <!-- You can display other relevant class information here -->
            </div>

            <!-- Card for Subject Information -->
            <div class="bg-white p-4 rounded-lg shadow-md card-animation animate__animated animate__bounce">
                <h3 class="text-1xl font-semibold mb-4 ">Subject Information</h3>
                <p>Total Number of Subjects: 50</p>
                <a href="{{route('subjects.index')}}">View</a>
                <!-- You can display other relevant subject information here -->
            </div>
        </div>
    </div>


@endsection
