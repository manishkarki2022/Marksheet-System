@extends('layout.dashboard')

@section('content')

    <form action="{{ route('class.store') }}" method="POST" class="max-w-md mx-auto p-4 border rounded shadow bg-white">
        @csrf
        <label for="class" class="block mb-2 font-bold">Class Name:</label>
        <input type="text" name="class" required class="w-full p-2 mb-4 border rounded">

        <label class="block mb-2 font-bold">Subjects:</label>
        @foreach($subjects as $subject)
            <div class="mb-2">
                <input type="checkbox" name="subjects[]" value="{{ $subject->id }}" class="mr-2">
                <label for="subjects[]" class="select-none">{{ $subject->name }}</label>
            </div>
        @endforeach

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer">Create Class</button>
    </form>

@endsection
