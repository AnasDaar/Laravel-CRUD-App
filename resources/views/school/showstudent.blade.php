@extends('school.master')
@section('content')
<div class="container">
    <h2 class="text-center display-3">All Students</h2>
    @if (Session::has('msg1'))
        <div class="alert alert-success">{{Session::get('msg1')}}</div>
        
    @endif
    @if (Session::has('msg2'))
        <div class="alert alert-danger">{{Session::get('msg2')}}</div>
        
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Age</th>
            <th>Class Name</th>
            <th>Marks</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($school as $helo)
        <tr>
            <td>{{$helo->id}}</td>
            <td>{{$helo->name}}</td>
            <td>{{$helo->fathername}}</td>
            <td>{{$helo->age}}</td>
            <td>{{$helo->class}}</td>
            <td>{{$helo->mark}}</td>
            <td>
                <img src="{{asset('upload/student'.$helo->image)}}" >
            </td>
            <td>{{$helo->created_at->diffForHumans()}}</td>
            <td><a href="{{url('/edit'.$helo->id)}}"  class="btn btn-info">Edit</a></td>
            <td><a href="{{url('/delete/'.$helo->id)}}"  class="btn btn-danger">Delete</a></td>
        </tr>
            
        @endforeach

    </table>
    <hr>
    <a href="{{url('/downloadPDF')}}" class="btn btn-primary btn-block">Download Data Into PDF Format</a>

</div>


@endsection