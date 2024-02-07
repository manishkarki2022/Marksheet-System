@extends('layout.dashboard')

@section('content')
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Class Details</h2>

        <!-- Class Details -->
        <div class="mb-4">
            <p class="text-lg font-semibold">Class Name: {{ $class->name }}</p>
            <p class="text-lg font-semibold">Subjects:</p>
            <ul>
                @foreach($class->subjects as $subject)
                    <li>{{ $subject->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Section Details -->
        <h2 class="text-2xl font-semibold mb-4">Sections</h2>
        <table class="w-full border border-gray-300">
            <thead>
            <tr>
                <th class="border-b p-2">Section Name</th>
                <th class="border-b p-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($class->sections as $section)
                <tr>
                    <td class="border-b p-2">{{ $section->name }}</td>
                    <td class="border-b p-2">
                        <a href="{{ route('sections.edit', $section->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="border-b p-2" colspan="2">No sections found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Add Section Button -->
        <div class="mt-4">
            <a href="{{ route('sections.create', ['class_id' => $class->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Add Section</a>
        </div>
    </div>
@endsection
