<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts')->get();
        $users = DB::table('users')->where('id', 1)->first();

        $students = [
            ['name' => 'Karl Guevarra', 'course' => 'BS Computer Science'],
            ['name' => 'Jane Doe', 'course' => 'BS Information Technology'],
            ['name' => 'John Smith', 'course' => 'BS Software Engineering'],
        ];
        return view('students.students', compact('posts', 'users', 'students'));
    }

    public function student()
    {
        return view('students.students_add');
    }

    public function student_add(Request $request)
    {
        DB::table('posts')->insert([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('index')
        ->with('success', 'Student added successfully!');
    }

    public function student_edit_form($id)
    {   
        $student = DB::table('posts')->where('id', '=', $id)->first();
        return view('students.students_edit', compact('student'));
    }

    public function student_edit(Request $request, $id)
    {
        $student = Post::find($id);

        $student->name = $request->input('name');
        $student->type = $request->input('type');
        $student->update();
        return redirect()->route('index')
        ->with('success', 'Student updated successfully!');
    }

    public function student_delete($id)
    {
        $student = Post::find($id);
        $student->delete();
        return redirect()->route('index')
        ->with('success', 'Student deleted successfully!');
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "CREATe";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "SHOW";
    }

    /**
     * Show the form for editing the specified resource.
     */

    
    public function edit(string $id)
    {
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy";
    }

    
}
