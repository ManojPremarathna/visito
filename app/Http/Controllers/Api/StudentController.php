<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::paginate();

        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): Student
    {
        return Student::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): Student
    {
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student): Student
    {
        $student->update($request->validated());

        return $student;
    }

    public function destroy(Student $student): Response
    {
        $student->delete();

        return response()->noContent();
    }
}
