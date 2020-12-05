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
                        <h5 class="card-title">{{$course->title}}</h5>
                        <p class="card-text">{{__('student.main_lang')}}: {{$course->language_id == 1 ? 'Русский язык' : 'Казахский язык'}}</p>

                    </div>
                    <div class="card-footer text-muted text-left">
                        <a href="{{\App\Models\Subscriber::where(['course_id' => $course->id, 'user_id' => Auth::id()])->first() ? 'javascript:void(0)' : route('sendSubscribe', $course->alias)}}" class="btn btn-raised btn-{{\App\Models\Subscriber::where(['course_id' => $course->id, 'user_id' => Auth::id()])->first() ? 'success' : 'info'}}">{{\App\Models\Subscriber::where(['course_id' => $course->id, 'user_id' => Auth::id()])->first() ? __('student.subscribed') : __('student.subscribe')}}</a>
                        <a href="{{route('userSingleCourse', $course->alias)}}" class="btn btn-outline-dark">{{__('student.page_of_course')}}</a>
                    </div>
                </div>
            @endforeach

            {!! $courses->links() !!}
        </div>
    </div>
@endsection

