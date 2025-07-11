@extends('layouts.app')

@section('content')

<section>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 content-col">
            <h2 class="mb-4">List of Students</h2>
            <div class="row row-cols-2 row-cols-md-3 g-4">
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
        </div>
    </div>
    
</div>

</section>
@endsection