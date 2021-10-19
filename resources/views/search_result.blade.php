@extends('layouts.app')

@section('content')

   <section>
   <div>
   <div>SEARCH RESULTS for "{{ $query }}"</div>
   </div>
   </section>

    <section class="category-course-list-area">
       
                    <div class="category-course-list">
                        <ul>
                            @foreach($details as $course)
                                <li>
                                    <div class="course-box-2">
                                        <div class="course-image">
                                            <a href="{{ route('course_detail', $course) }}">
                                                <img src="{{ asset('images/learning.jpg') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="course-details">
                                            <a href="{{ route('course_detail', $course) }}" class="course-title">{{ $course->title }}</a>
                                            {{--<a href="" class="course-instructor">--}}
                                                {{--<span class="instructor-name">first_name last_name</span>--}}
                                                {{-----}}
                                            {{--</a>--}}
                                            <div class="course-subtitle">
                                                {{ $course->short_description }}
                                            </div>
                                            <div class="course-meta">
                                                <span class="">
                                                    <i class="fas fa-play-circle"></i>
                                                    {{ $course->lessons->count() }} Lessons
                                                </span>
                                                <span class="">
                                                    <i class="far fa-clock"></i>
                                                    3 hours
                                                </span>
                                                <span class="">
                                                    <i class="fas fa-closed-captioning"></i>English
                                                </span>
                                            </div>
                                        </div>
                                        <div class="course-price-rating">
                                            <div class="course-price">
                                                <span class="current-price">R{{ $course->price }}</span>
                                                {{--<span class="original-price">R300</span>--}}
                                            </div>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">5</span>
                                            </div>
                                            <div class="rating-number">
                                                {{ $course->reviews->count() }} Ratings
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <nav>
                        {{--pagination--}}
                        
                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection