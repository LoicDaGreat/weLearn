@extends('lecturers.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="accordion" id="accordionExample">
                    <div class="card" style="margin:10px 0;">

                        <div id="" class="collapse show"
                             aria-labelledby="" data-parent="#accordionExample">
                            <div class="card-body" style="padding:0;">
                                <table style="width: 100%;">

                                    

                                        <tr style="width: 100%; padding: 5px 0px;">
                                            <td style="text-align: left;padding:10px; border-bottom:1px solid #ccc;">
                                                <!-- <a href="{{ route('lecturers.lessons.index', [$lesson->id]) }}" -->
                                                   <!-- id="{{ $lesson->id }}"> -->
                                                    <i class="fa fa-play"
                                                       style="font-size: 12px;color: #909090;padding: 10px;"></i>
                                                    {{ $lesson->title }}
                                                </a>
                                            </td>
                                            <td style="text-align: right; padding:10px; border-bottom:1px solid #ccc;">
                                                <span class="lesson_duration">
                                                    {{ $lesson->duration }}
                                                </span>
                                            </td>
                                        </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9" id="video_player_area">
                <div class="" style="background-color: #333;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="100%" height="500" class="embed-responsive-item"
                                src="https://www.youtube.com/embed/{{ $lesson->video }}" frameborder="0"
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection