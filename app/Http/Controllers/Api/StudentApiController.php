<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function index()
    {
        return response()->json([
        'status' => true,
        'message' => 'Student list fetched successfully',
        'data' => StudentResource::collection(Student::paginate(5))
    ], 200);
    }

  public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:students',
        'phone' => 'required',
        'course' => 'required',
        'status' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $student = Student::create($request->all());

   return response()->json([
        'status' => true,
        'message' => 'Student created successfully',
        'data' => new StudentResource($student)
    ], 201); // Created
}

public function show($id)
{
    $student = Student::find($id);

    if (!$student) {
        return response()->json([
            'status' => false,
            'message' => 'Student not found'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'Student fetched successfully',
        'data' => new StudentResource($student)
    ], 200);
}

   public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validator = \Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:students,email,'.$id,
        'phone' => 'required',
        'course' => 'required',
        'status' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $student->update($request->all());

   return response()->json([
        'status' => true,
        'message' => 'Student updated successfully',
        'data' => new StudentResource($student)
    ], 200);
}

    public function destroy($id)
{
    $student = Student::find($id);

    if (!$student) {
        return response()->json([
            'status' => false,
            'message' => 'Student not found'
        ], 404);
    }
    $student->delete();

    return response()->json([
        'status' => true,
        'message' => 'Student deleted successfully'
    ], 200);
}
}