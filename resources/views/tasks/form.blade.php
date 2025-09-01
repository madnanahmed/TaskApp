@extends('layouts.app')
@section('content')
    <div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6">{{ isset($task) ? 'Edit Task' : 'Create Task' }}</h1>
        <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
            @csrf
            @if(isset($task))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" name="title" value="{{ old('title', $task->title ?? '') }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" name="description" rows="3" required>{{ old('description', $task->description ?? '') }}</textarea>
            </div>
            <div class="mb-6">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="status" name="status" required>
                    <option value="0" {{ (old('status', $task->status ?? '') == '0') ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ (old('status', $task->status ?? '') == '1') ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
                {{ isset($task) ? 'Update' : 'Create' }} Task
            </button>
        </form>
    </div>
@endsection