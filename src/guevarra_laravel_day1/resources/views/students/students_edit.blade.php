@extends('layouts.app')

@section('content')
    <h1>Edit a Student</h1>
    <form action="{{ route('students.edit', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>
        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ $student->type }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="{{ route('index') }}" type="button" class="btn btn-secondary">Go to index</a>
    </form>
@endsection