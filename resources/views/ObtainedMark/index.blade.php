@extends('layout.dashboard')

@section('content')

    <div class="flex-1 overflow-x-hidden overflow-y-auto p-4">
        <h2 class="text-xl font-semibold mb-4">Class</h2>
        <a class="px-4 py-2 bg-blue-500  text-white rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300 float-right mb-1" href="{{route('class.create')}}">
           Add Class
        </a>


        <!-- Table -->
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $class->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('class.show', $class->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('subjects.edit', $class->id) }}" class="text-green-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('subjects.destroy', $class->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
