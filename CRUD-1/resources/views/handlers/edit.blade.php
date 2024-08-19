@extends('Main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('task.css') }}">
@endsection

@section('editForm')
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        <input type="text" name="Task_Name" value="{{ $task->Task_Name }}">
        <button type="submit">Update Task</button>
    </form>
@endsection
