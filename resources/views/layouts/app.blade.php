<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10">
{{--make menu--}}
<nav class="mb-4">
    <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline mr-4">Task List</a>
    <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:underline">Create Task</a>
</nav>
<h1>@yield('title')</h1>
<div>
    <div x-data="{ flash:true}">
        @if(session()->has('success'))
        <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
             role="alert">
            <strong class="font-bold">Success!</strong>
            <div>{{ session('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="flash=false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="relative bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-1" role="alert">
            <strong class="font-bold">Error!</strong>
            <div>{{ session('error') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="flash=false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>
       @endif
    </div>
@yield('content')
</div>
</body>
</html>