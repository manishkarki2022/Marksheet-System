@extends('layout.dashboard')

@section('content')

    <div class="flex-1 overflow-x-hidden overflow-y-auto p-4">

        <h2 class="text-xl font-semibold mb-4">Class :{{$class->name}}</h2>
        <h2 class="text-xl font-semibold mb-4">Section :{{$section->name}}</h2>
        <a href="{{ route('Obtainedmarks.create', ['section_id' => $section->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 float-left mb-1">Add Obtained Marks</a>
        <a href="{{ route('students.create', ['section_id' => $section->id,'class_id'=> $class->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 float-right mb-1">Add Student</a>


        <!-- Table -->
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            @if($students)
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('students.show', $student->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('subjects.edit', $student->id) }}" class="text-green-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('subjects.destroy', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            @endif
        </table>
    </div>




@endsection
