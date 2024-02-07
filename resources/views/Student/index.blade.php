<!-- student/index.blade.php -->

@extends('layout.dashboard')

@section('content')
    <div class="flex-1 overflow-x-hidden overflow-y-auto p-4">
        <h3 class="text-center">Total Students: {{ count($students) }}</h3>

        <div class="inline">
            <form action="{{ route('students.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search by name, class, or section" class="px-4 py-2 border text-1.5xl rounded" value="{{ request('search') }}">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300 mb-1">
                    Search
                </button>
            </form>

            <a href="{{ route('students.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300 float-right mb-1">
                Add Student
            </a>
        </div>

        @if($students->isEmpty())
            <p class="text-lg text-red-500 mt-4">No students found.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">
                        <a href="{{ route('students.index', ['sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Student Name</a>
                    </th>
                    <th class="py-2 px-4 border-b">
                        <a href="">Student Class</a>
                    </th>
                    <th class="py-2 px-4 border-b">
                        <a href="">Student Section</a>
                    </th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $student->studentClass->name }}</td>
                        <td class="py-2 px-4 border-b">
                            @if($student->sections)
                                {{ $student->sections->name }}
                            @else
                                No Section
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('students.show', $student->id) }}" class="text-blue-500">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="text-green-500 hover:underline ml-2">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
