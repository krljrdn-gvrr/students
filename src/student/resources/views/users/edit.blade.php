@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1>Add User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ old('role', $user->role) === 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label>Password</label>
            <input type="text" name="password" class="form-control" value="{{ $user->password }}" required>
        </div>
         -->
        <div class="mb-3">
            <label for="photo" class="form-label">Current Photo</label><br>
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" width="100" height="100" class="rounded-circle mb-2">
            @else
                <p>No photo uploaded.</p>
            @endif
        </div>
        <div class="mb-3">
            <label>Upload New Photo (Optional)</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('users.index') }}" type="button" class="btn btn-secondary">Go to index</a>
    </form>
@endsection