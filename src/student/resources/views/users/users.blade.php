@extends('layouts.app')

@section('content')

<section>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 content-col">
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <h1>Welcome to the Users Module</h1>
      <p class="lead">This is your homepage where you can manage users profiles and perform related actions.</p>
       <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
      <br>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td>
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" width="50" height="50" class="rounded-circle">
                @else
                    <span>No Photo</span>
                @endif
              </td>
              <td>{{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y, gA') }}</td>
              <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $user->id }}">Delete</button>
              </td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
</div>
</div>
</div>
</section>
      
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');

        Swal.fire({
          title: 'Are you sure?',
          text: "This action cannot be undone!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            fetch(`/users/delete/${userId}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
            })
            .then(response => response.json())
            .then(data => {
              Swal.fire('Deleted!', data.success, 'success')
              .then(() => window.location.reload());
            })
            .catch(error => {
              Swal.fire('Error', 'Something went wrong!', 'error');
            });
          }
        });
      });
    });
  });
</script>
