@extends('layout')

@section('content')

<h3>Edit Student</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('students.update', $student->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control">
    @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $student->email) }}" class="form-control">
    @error('email')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" class="form-control">
    @error('phone')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Course</label>
    <select name="course" class="form-control">
        <option value="">Select Course</option>
        <option value="BCA" {{ old('course', $student->course)=='BCA' ? 'selected' : '' }}>BCA</option>
        <option value="MCA" {{ old('MCA', $student->course)=='MCA' ? 'selected' : '' }}>MCA</option>
        <option value="Btech" {{ old('Btech', $student->course)=='Btech' ? 'selected' : '' }}>Btech</option>
    </select>
    @error('course')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="">Select Status</option>
        <option value="Active" {{ old('status', $student->status)=='Active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ old('status', $student->status)=='Inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<button class="btn btn-primary">Update</button>

</form>

@endsection