@extends('layout')
@section('content')
<h3> Students List</h3>



<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Section</th>
                <th>Image</th>

            </tr>

        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->section }}</td>
                <td><img src="image/{{ $student->image}}" width="96" height="96"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection