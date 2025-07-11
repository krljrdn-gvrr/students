@extends('layouts.app')

@section('content')

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <h1>Welcome to the Students Module</h1>
      <p class="lead">This is your homepage where you can manage student profiles and perform related actions.</p>
      <!-- <a href="{{ route('students.view') }}" class="btn btn-primary">Go to Student List</a> -->
       <a href="{{ route('students.add') }}" class="btn btn-primary">Add Students</a>
      <br>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->name }}</td>
              <td>{{ $post->type }}</td>
              <td>{{ $post->created_at }}</td>
              <td>
                <a href="{{ route('students.edit.form', $post->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('students.delete', $post->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
              </td>
            </tr>
          @endforeach
          
        </tbody>
      </table>

        <h1>{{ $users->name }}</h1>
        <h5>{{ $users->email }}</h5>
      
@endsection

