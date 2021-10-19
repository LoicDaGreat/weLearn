@extends('lecturers.layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <div class="card uper">

  <div class="card-header">
    <a class="btn btn-primary" href="{{ route('lecturers.lessons.create') }}"> Upload New Lesson</a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <td>Course_ID</td>
          <td> Title</td>
          <td>Video URL</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
        <tr>
            <td>{{$lesson->course_id}}</td>
            <td>{{$lesson->title}}</td>
            <td>{{$lesson->video}}</td>
            <td><a href="{{ route('lecturers.lessons.edit',$lesson->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a class="btn btn-primary" href="{{ route('lecturers.lessons.show',$lesson->id) }}">Show</a></td>
            <td>
                <form action="{{ route('lecturers.lessons.destroy', $lesson->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection