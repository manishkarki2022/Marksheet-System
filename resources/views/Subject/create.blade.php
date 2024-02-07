@extends('layout.dashboard')

@section('content')

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-6">Add New Subject</h2>

        <!-- Subject Form -->
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf

            <!-- Subject Name Field -->
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-600">Subject Name</label>
                <input type="text" name="subject" id="subject" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">Add Subject</button>
        </form>
    </div>

@endsection
