<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered" >
    <thead>
      <tr>
        <th>Student Name</th> 
        <th>Father Name</th>    
        <th>Age</th> 
        <th>Class</th> 
        <th>Marks</th> 
      </tr>
      </thead>
      <tbody>
      <tr>
        @foreach ($show as $shows )
        <tr>
            <td>{{$shows->id}}</td> 
            <td>{{$shows->name}}</td>
            <td>{{$shows->fathername}}</td>
            <td>{{$shows->age}}</td>
            <td>{{$shows->class}}</td>
            <td>{{$shows->mark}}</td>
            
        </tr>
        @endforeach
      </tr>
      </tbody>
    </table>
  </body>
</html>