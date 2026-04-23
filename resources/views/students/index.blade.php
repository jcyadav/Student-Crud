@extends('layout')

@section('content')

<a href="{{ route('students.create') }}" class="btn btn-primary mb-2">Add</a>

<form method="GET" action="{{ route('students.index') }}">
    <div class="input-group mb-3">
        <input type="text" name="search" value="{{ request('search') }}" 
               class="form-control" placeholder="Search by name or email">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
<tr>
<th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Status</th><th>Action</th>
</tr>

@foreach($students as $s)
<tr>
<td>{{ $s->name }}</td>
<td>{{ $s->email }}</td>
<td>{{ $s->phone }}</td>
<td>{{ $s->course }}</td>
<td>{{ $s->status }}</td>
<td>
<a href="{{ route('students.edit',$s->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('students.destroy',$s->id) }}" method="POST" style="display:inline">
@csrf @method('DELETE')
<button class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach

</table>

{{ $students->links() }}

@endsection