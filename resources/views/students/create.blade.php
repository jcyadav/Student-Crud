@extends('layout')

@section('content')

<h3>Add Student</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('students.store') }}">
@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name">
    @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email">
    @error('email')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter Phone">
    @error('phone')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Course</label>
    <select name="course" class="form-control">
        <option value="">Select Course</option>
        <option value="BCA" {{ old('course')=='BCA' ? 'selected' : '' }}>BCA</option>
        <option value="MCA" {{ old('course')=='MCA' ? 'selected' : '' }}>MCA</option>
        <option value="Btech" {{ old('Btech')=='Btech' ? 'selected' : '' }}>Btech</option>
    </select>
    @error('course')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="">Select Status</option>
        <option value="Active" {{ old('status')=='Active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ old('status')=='Inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<button class="btn btn-success">Submit</button>

</form>

@endsection