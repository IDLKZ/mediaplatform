@extends('admin.layout')
@section('content')
    <!--  CONTENT  -->
    <a href="{{route("admin-course.index")}}" class="btn btn-raised btn-info">{{__("content.back")}}</a>

    <div class="page page-dashboard">
        <div class="row clearfix">

            <div class="md-12">

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs user_widget">
                        <div class="uw_header l-blush">
                            <h5 title="{{$course->title}}">{{strlen($course->title) >40 ? mb_substr($course->title,0,45). "..." : $course->title}}</h5>
                            <small>{{\Illuminate\Support\Carbon::parse($course->created_at)->diffForHumans()}}</small>
                        </div>
                        <div class="uw_image"> <img class="img-circle" src="{{$course->img}}" style="min-height: 120px" alt="{{$course->title}}"></div>
                        <div class="uw_footer">
                            <div class="text-center">
                                <p class="mt-20">{{$course->subtitle}}</p>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <h5>{{__("admin.course_lang")}}:</h5>
                                        <span>{{$course->language->title}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <h5>{{__('admin.course_author')}}</h5>
                                        <span>{{$course->author->name}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="uw_description">
                                        <h5>{{__('admin.updated')}}:</h5>
                                        <span>{{\Illuminate\Support\Carbon::parse($course->updated_at)->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div></div></div>
                <div class="col-md-8">
                    <section class="boxs" style="height: 464px; overflow: scroll">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-blush">
                                <strong>{{__('admin.course_info')}}</strong> </h3>

                        </div>
                        <div class="boxs-body">
                            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#about" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">{{__('admin.course_about')}}</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#advantage" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">{{__('admin.course_skills')}}</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#requirement" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">{{__('admin.course_requirement')}}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active in" role="tabpanel" id="about" aria-labelledby="home-tab"
                                         style="height: auto"
                                    >
                                        {!! $course->description !!}
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="advantage" aria-labelledby="profile-tab">
                                        @if (count($course->advantage))
                                            <h5 class="custom-font hb-blush">
                                                <strong>{{__('admin.course_what_will_you_learn')}}:</strong> </h5>
                                            <ul class="list-unstyled">
                                                @foreach($course->advantage as $advantage)
                                                    <li>
                                                        <i class="fa fa-check"></i>{{$advantage}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="requirement" aria-labelledby="home-tab">
                                        {{$course->requirement}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>




            </div>


        </div>
    </div>
    <!--/ CONTENT -->

@endsection
