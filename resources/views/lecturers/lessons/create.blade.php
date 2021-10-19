@extends('lecturers.layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create Post
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
      <form method="post" action="{{ route('lecturers.lessons.store') }}">
          <div class="form-group">
              @csrf
              <label for="course_id">Course:</label>
              <input type="number" class="form-control" name="course_id" id="title" />
          </div>
          <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" name="title" id="" class="form-control" />
              
          </div>
          <div class="form-group">
              <label for="duration">Duration:</label>
              <input type="text" name="duration" id="duration" class="form-control" />
              
          </div>
          <div class="form-group">
              <label for="video">Video Url:</label>
              <input type="text" name="video" id="video" class="form-control" />
              
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
@endsection