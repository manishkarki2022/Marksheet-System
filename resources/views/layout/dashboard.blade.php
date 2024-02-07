<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

      @isset($pageTitle)
        <title>{{$pageTitle}}</title>
    @else
        <title>Marksheet System</title>
    @endisset



    <style>
       .word{
           position: relative;
           animation: move-words 10s linear infinite;
           margin: 0;
       }
        @keyframes move-words {
            0% { right: 0; }
            100% { right: -100%; }
        }
    </style>
</head>
<body class="flex h-screen bg-gray-100">
<!-- Sidebar -->

<aside id="sidebar-multi-level-sidebar" class="bg-gray-800 top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 p-4" aria-label="Sidebar">
    <div class="h-full px-3 py-5 overflow-y-auto bg-gray-800 transition-transform duration-300 ease-in-out">
        <ul class="space-y-6 font-medium">
            <li class="group transition-transform duration-300 ease-in-out transform hover:-translate-x-2">
                <a href="/" class="flex items-center p-2 rounded-lg text-white {{ request()->is('/') ? 'bg-gray-500' : 'hover:bg-gray-500 group' }}">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li class="group transition-transform duration-300 ease-in-out transform hover:-translate-x-3">
                <button type="button" class="subjectButton flex items-center p-2 rounded-lg text-white {{ request()->is('/subjects*') ? 'bg-gray-500' : 'hover:bg-gray-500 group' }}" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Subject</span>
                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2 transition duration-300 ease-in-out">
                    <li>
                        <a href="{{ route('subjects.create') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white {{ request()->is('subjects/create') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('subjects.index') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white {{ request()->is('/subjects') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">List</a>
                    </li>
                </ul>
            </li>

            <li class="group transition-transform duration-300 ease-in-out transform hover:-translate-x-3">
                <button type="button" class="examButton flex items-center p-2 rounded-lg text-white hover:bg-gray-500 group" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Exam</span>
                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example2" class="hidden py-2 space-y-2 transition duration-300 ease-in-out">
                    <li>
                        <a href="{{ route('exams.create') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('exams.index') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">List</a>
                    </li>
                </ul>
            </li>

            <li class="group transition-transform duration-300 ease-in-out transform hover:-translate-x-3">
                <button type="button" class="classButton flex items-center p-2 rounded-lg text-white hover:bg-gray-500 group" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Class</span>
                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example3" class="hidden py-2 space-y-2 transition duration-300 ease-in-out">
                    <li>
                        <a href="{{ route('class.create') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('class.index') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">List</a>
                    </li>
                </ul>
            </li>

            <li class="group transition-transform duration-300 ease-in-out transform hover:-translate-x-3">
                <button type="button" class="studentButton flex items-center p-2 rounded-lg text-white hover:bg-gray-500 group" aria-controls="dropdown-example4" data-collapse-toggle="dropdown-example4">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Student</span>
                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example4" class="hidden py-2 space-y-2 transition duration-300 ease-in-out">
                    <li class="test">
                        <a href="{{ route('students.create') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">Add</a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>


<!-- Content Area -->
<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Top Navigation Bar -->
    <header class="bg-white border-b p-4">
        <!-- Top navigation content goes here -->
       @isset($pageTitle)
            <div class="text-3xl font-semibold word">{{$pageTitle}}</div>
        @else
            <div class="text-3xl font-semibold word">Marksheet System</div>

        @endisset
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-4">
        <!-- Content of your dashboard goes here -->
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t p-4">
        <!-- Footer content goes here -->
        <p>&copy; 2024 Marksheet</p>
    </footer>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current path
        var currentPath = window.location.pathname;


        // Check if the current path is related to subjects
        if (currentPath.startsWith('/subjects')) {

            // Add active class to the Subject button

            var subjectButton = document.querySelector('.subjectButton');
            subjectButton.classList.add('bg-gray-500');

            // Hide the dropdown
            var dropdownElement = document.getElementById("dropdown-example");
            dropdownElement.classList.remove("hidden");
        }
        else if(currentPath.startsWith('/exams')){
            var examButton = document.querySelector('.examButton');
            examButton.classList.add('bg-gray-500');

            // Hide the dropdown
            var dropdownElement = document.getElementById("dropdown-example2");
            dropdownElement.classList.remove("hidden");

        }
        else if(currentPath.startsWith('/class')){
            var classButton = document.querySelector('.classButton');
            classButton.classList.add('bg-gray-500');

            // Hide the dropdown
            var dropdownElement = document.getElementById("dropdown-example3");
            dropdownElement.classList.remove("hidden");

        }
        else if(currentPath.startsWith('/students')){
            var studentButton = document.querySelector('.studentButton');
            studentButton.classList.add('bg-gray-500');

            // Hide the dropdown
            var dropdownElement = document.getElementById("dropdown-example4");
            dropdownElement.classList.remove("hidden");

        }
    });
</script>
<script src="wow.min.js"></script>
<script>
    new WOW().init();
</script>


<!-- Include your Vite JavaScript import or link to your compiled JS file -->
<!-- You can place your script at the end of the body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
@vite('resources/js/app.js')
</body>
</html>
