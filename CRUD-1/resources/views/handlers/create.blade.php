@extends('Main')

@section('createForm')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="Task_Name">
        <button type="submit">add</button>
    </form>
@endsection
