@extends('lecturers.layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Lesson
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('lecturers.lessons.update', $lesson->id) }}">
                @csrf

        @method('PUT')

        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="title" id="lesson_title" value={{ $lesson->title }} />
        </div>
        <div class="form-group">
          <label for="title">Course_id:</label>
          <input type="text" class="form-control" name="course_id" id="course_id" value={{ $lesson->course_id }} />
        </div>
        <div class="form-group">
          <label for="title">duration:</label>
          <input type="text" class="form-control" name="duration" id="lesson_duration" value={{ $lesson->duration }} />
        </div>
        <div class="form-group">
          <label for="title">video URL:</label>
          <input type="text" class="form-control" name="video" id="lesson_video" value={{ $lesson->video }} />
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection