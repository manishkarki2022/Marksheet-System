@extends('layout.dashboard')

@section('content')
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Add Section</h2>

        <!-- Class Details -->
        <div class="mb-4">
            <p class="text-lg font-semibold">Class Name: {{ $class->name }}</p>
            <p class="text-lg font-semibold">Subjects:</p>
            <ul>
                @foreach($subjects as $subject)
                    <li>{{ $subject->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Section Form -->
        <form action="{{route('sections.store')}}" method="POST">
            @csrf

            <!-- Class ID -->
            <input type="hidden" name="class_id" value="{{ $class->id }}">

            <!-- Section Name Field -->
            <div class="mb-4">
                <label for="section" class="block text-sm font-medium text-gray-600">Section Name</label>
                <input type="text" name="section" id="section" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">Add New Section</button>
        </form>
    </div>
@endsection
