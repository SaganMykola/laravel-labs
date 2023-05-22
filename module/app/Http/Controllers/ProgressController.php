<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Progress;
use Illuminate\Support\Facades\Gate;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
        return view('progress.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $progress = Progress::create(
            $request->all(['subjects', 'scores', 'date', 'student_id'])
        );
        return \redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $progress = Progress::find($id);
        return view('progress.show', compact('progress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $progress = Progress::find($id);
        if (! Gate::allows('edit-progress', $progress)) {
            abort(403, "no access");
        }
        return view('progress.edit', compact('progress'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $progress = Progress::find($id);
        $progress->subjects = $request->input('subjects');
        $progress->scores = $request->input('scores');
        $progress->date = $request->input('date');
        $progress->student_id = $request->input('student_id');
        $progress->save();
        return \redirect('progress' . '/' . $progress->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $progress = Progress::find($id);
        if (! Gate::allows('delete-student', $progress)) {
            abort(403, "no access");
        }
        $progress->delete();
        return \redirect('students');
    }
}
