@extends('admin.layout')
@section('content')
    <!-- row -->
    <div class="page page-content">
        <a href="{{route("admin-request")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
        <div class="row">
            @foreach($results as $result)
                <div class="col-md-4 mh-350 p-10">
                    <section class="boxs">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-cyan">
                                <strong>{{__("admin.result")}} {{$result->student->name}}</strong></h3>
                        </div>
                        <div class="boxs-body">
                            <ul class="inbox-widget list-unstyled clearfix">
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="{{$str = $result->status == 1 ? "fa fa-check-circle text-success" : ($result->status == 0 ? "fa fa fa-clock-o text-warning" : "fa fa-warning text-danger")}}"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$str = $result->status == 1 ? __('admin.checked') : ($result->status == 0 ? __('admin.unchecked') : __('admin.recheck'))}}</p>
                                                <p class="inbox-message">{{__('admin.status')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"> <img src="{{$img = $result->student->img !=null ? $result->student->img :"/images/no-image.png" }}" alt=""> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->student->name}}</p>
                                                <p class="inbox-message">{{__('admin.user.student')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"> <img src="{{$img = $result->author->img !=null ? $result->author->img :"/images/no-image.png" }}" alt=""> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->author->name}}</p>
                                                <p class="inbox-message">{{__('admin.user.teacher')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"> <img src="{{$img = $result->course->img !=null ? $result->course->img :"/images/no-image.png" }}" alt=""> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->course->title}}</p>
                                                <p class="inbox-message">{{__('admin.course')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="fa fa-video-camera"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->video->title}}</p>
                                                <p class="inbox-message">{{__('admin.video')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="fa fa-clock-o"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{\Carbon\Carbon::parse($result->passed_day)->diffForHumans()}}</p>
                                                <p class="inbox-message">{{__('admin.pass_time')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="fa fa-clock-o"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$str = $result->checked_day != null ? \Carbon\Carbon::parse($result->checked_day)->diffForHumans() : "Не проверено"}}</p>
                                                <p class="inbox-message">{{__('admin.check_time')}}</p>
                                            </div>
                                        </div>
                                    </a> </li>

                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 border-right">
                                <div class="uw_description">
                                    <a href="{{route("admin-result.edit",$result->id)}}" class="btn btn-warning btn-raised btn-round">
                                        <i class="fa fa-pencil-square">  </i>
                                        <small class="sm-none">{{__('admin.change')}}</small>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <form action="{{route("user.destroy",$result->id)}}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button onclick="return confirm({{__('admin.question')}})" type="submit" class="btn btn-danger btn-raised btn-round">
                                            <i class="fa fa-bitbucket pr-2">  </i>
                                            <small class="sm-none">{{__('admin.delete')}}</small>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
    </div>

    <!--/ CONTENT -->
@endsection


