@extends('layouts.app')

@section('title')
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">All Tasks</h2>
@endsection

@section('content')
    

<div class=" justify-center items-center p-8 bg-gradient-to-br from-blue-100 to-indigo-200">
    <div class=" flex justify-center mb-6">
        <a href="{{ route('tasks.create') }}" class="mb-4 inline-block bg-indigo-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-700 transition">
            + Add New Task
        </a>
    </div>
    <div class="flex justify-center items-center">
        <div class="bg-white shadow-2xl rounded-2xl p-2 w-full max-w-lg">
            <ul class="space-y-4">
                @forelse($tasks as $task)
                    <li class="flex items-center justify-between bg-indigo-50 rounded-lg px-4 py-3 shadow-sm">
                        <div class="flex items-center gap-3">
                            <form action="{{ route('tasks.toggle', ['task' => $task]) }}" method="POST" class="mr-2">
                                @csrf
                                @method('PATCH')
                                <input 
                                    type="checkbox" 
                                    onchange="this.form.submit()" 
                                    {{ $task->status ? 'checked' : '' }}
                                    class="accent-indigo-600 w-5 h-5"
                                >
                            </form>
                            <span class="text-lg {{ $task->status==0 ? 'line-through text-gray-400' : 'text-gray-800' }}">
                                {{ $task->title }}
                            </span>
                            
                        </div>
                        <div class="flex items-center gap-3">
                            @if($task->status)
                                <span class="text-sm text-green-600 font-semibold bg-green-100 px-2 py-1 rounded-full">Completed</span>
                            @else
                                <span class="text-sm text-yellow-600 font-semibold bg-yellow-100 px-2 py-1 rounded-full">Pending</span>
                            @endif                        
                            
                            
                            <a href="{{ route('tasks.edit', $task->id) }}" class="ml-2 text-indigo-500 hover:text-indigo-700 underline text-sm transition"
                                    title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z"/>
                                    </svg>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="text-red-500 hover:text-red-700 transition"
                                    title="Delete"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="text-center text-gray-400 py-8">No tasks yet. Add your first task!</li>
                @endforelse
            </ul>
    </div>
    </div>
</div>
@endsection
