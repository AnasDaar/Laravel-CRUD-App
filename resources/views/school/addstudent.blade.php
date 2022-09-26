@extends('school.master')

@section('content')

<div class="container">
    <h1 class="text-center display-3">Add Student Data</h1>
    <form action="{{url('/savestudent')}}" method="POST"enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="display-5">Student Name: </label>
        <input type="text" class="form-control" name="sname">
    </div>
    <div class="form-group">
        <label class="display-5">Father Name: </label>
        <input type="text" class="form-control" name="fname">
    </div>
    <div class="form-group">
        <label class="display-5">Age: </label>
        <input type="text" class="form-control" name="age">
    </div>
    <div class="form-group">
        <label class="display-5">Class Name: </label>
        <input type="text" class="form-control" name="cname">
    </div>
    
    <div class="form-group">
        <label class="display-5">Marks: </label>
        <input type="text" class="form-control" name="mark">
    </div>
    <div class="form-group">
        <label class="display-5">Upload image: </label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
            <input type="submit" value="save data" class="btn btn-primary">
    </div>
    </form>

</div>

@endsection