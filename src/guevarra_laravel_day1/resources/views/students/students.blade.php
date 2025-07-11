@extends('layouts.app')

@section('content')
    <h2 class="mb-4">List of Students</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($students as $student)
    <div class="col">
       <x-student-card 
            :name="$student['name']" 
            :course="$student['course']" 
            view-button-color="success" 
            edit-button-color="warning"
        />
    </div>
    @endforeach

    

    </div>
    <!-- <a href="{{ route('index') }}">Go to Index Page</a> -->
@endsection