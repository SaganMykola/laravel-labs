<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Progress;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $progress = Progress::all();

        return view('students.index', compact('students', 'progress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::create(
            $request->all(['name', 'course', 'specialty'])
        );
        return \redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        if (! Gate::allows('edit-student', $student)) {
            abort(403, "no access");
        }
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->specialty = $request->input('specialty');
        $student->save();

        return \redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (! Gate::allows('delete-student', $student)) {
            abort(403, "no access");
        }

        $student->delete();
        return \redirect('students');
    }
}
