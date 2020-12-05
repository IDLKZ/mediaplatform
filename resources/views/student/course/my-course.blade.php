@extends('student.layout')
@section('content')
    <div class="col-md-12 col-lg-4 col-sm-12 mb-3">
        @include('student.left_sidebar')
    </div>
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="p-4">
            @foreach($courses as $course)
                <div class="card text-left mb-3">
                    <div class="card-body">
                        <div class="c100 p{{$course->videos->count() != 0 ? intval((count($course->results)/$course->videos->count())*100) : 0}} green small">
                            <span>{{$course->videos->count() != 0 ? intval((count($course->results)/$course->videos->count())*100) : 0}}%</span>
                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                        <h5 class="card-title">{{$course->course->title}}</h5>
                        <p class="card-text">{{__('student.main_lang')}}: {{$course->course->language_id == 1 ? 'Русский язык' : 'Казахский язык'}}</p>

                    </div>
                    <div class="card-footer text-muted text-left">
                        <a href="{{route('student.course.show', $course->course->alias)}}" class="btn btn-raised" id="auth">{{__('student.continue')}}</a>
                        <a href="{{route('userSingleCourse', $course->course->alias)}}" class="btn btn-outline-dark">{{__('student.page_of_course')}}</a>
                        @if ($course->course->videos->count() != 0)
                            @if (App\Models\Result::where(['student_id' => Auth::id(), 'course_id' => $course->course->id, 'status' => 1])->count() == $course->course->videos->count())
                                <a href="{{route('getCertificate', $course->course->id)}}" class="btn btn-raised btn-outline-secondary">{{__('student.get_certificate')}}</a>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
