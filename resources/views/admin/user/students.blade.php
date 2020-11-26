@extends('admin.layout')
@section('content')
    <a href="{{route("admin-users")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.user.all_students")}}</h1>
                    <small class="text-muted">{{__("admin.user.student_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @if ($students->isNotEmpty())
                @foreach($students as $student)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section class="boxs user_widget">
                            <div class="uw_header l-blush">
                                <h5>{{$student->name}}</h5>
                                <div class="uw_image">
                                    <img class="img-circle" src="{{$img = $student->img !=null ? $student->img :"/images/no-image.png" }}" alt="User Avatar">
                                </div>

                            </div>
                            <div class="uw_footer">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <h5>{{$student->uservideo->count()}}</h5>
                                            <span>{{__("admin.videos")}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <h5>{{$student->subscribers->count()}}</h5>
                                            <span>{{__("admin.courses")}}</span>
                                        </div>
                                    </div>

                                </div>
                                <section class="boxs boxs-simple">
                                    <div class="boxs-header">
                                        <h3 class="custom-font hb-green">
                                            <strong>{{__("admin.info")}}</strong></h3>
                                    </div>
                                    <div class="boxs-body">
                                        <div class="panel panel-default">
                                                <ul class="media-list feeds_widget m-0">
                                                    <li class="media">
                                                        <div class="media-img"><i class="fa fa-user-circle"></i></div>
                                                        <div class="media-body">
                                                            <div class="media-heading">{{__("admin.user.student")}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <div class="media-img"><i class="icon-envelope"></i></div>
                                                        <div class="media-body">
                                                            <div class="media-heading">{{$student->email}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <div class="media-img"><i class="fa fa-phone"></i></div>
                                                        <div class="media-body">
                                                            <div class="media-heading">{{$student->phone}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <div class="media-img"><i class="{{$student->status == 1 ? "icon-check" : "icon-close"}}"></i></div>
                                                        <div class="media-body">
                                                            <div class="media-heading">{{$student->status == 1 ? __("admin.active") : __("admin.request")}}</div>
                                                        </div>
                                                    </li>

                                                </ul>
                                        </div>


                                    </div>
                                </section>

                                <div class="row">
                                    <div class="text-center">
                                        <a href="{{route("user.show",$student->id)}}" class="btn btn-raised btn-info">
                                            <i class="fa fa-eye"> </i>
                                            <small class="sm-none">{{__("admin.user.about_student")}}</small>

                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("user.edit",$student->id)}}" class="btn btn-warning btn-raised btn-round">
                                                <i class="fa fa-pencil-square">  </i>
                                                <small class="sm-none">{{__("admin.change")}}</small>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <form action="{{route("user.destroy",$student->id)}}" method="post">
                                                @method("DELETE")
                                                @csrf
                                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger btn-raised btn-round">
                                                    <i class="fa fa-bitbucket pr-2">  </i>
                                                    <small class="sm-none">{{__("admin.delete")}}</small>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                @endforeach
                {{$students->links()}}
            @else
                <h2>{{__("admin.no_student")}}</h2>
            @endif

        </div>


    </div>
    <a href="{{route("user.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>

@endsection
