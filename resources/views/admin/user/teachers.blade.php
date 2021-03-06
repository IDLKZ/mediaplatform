@extends('admin.layout')
@section('content')
    <a href="{{route("admin-users")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.user.all_teachers")}}</h1>
                    <small class="text-muted">{{__("admin.user.teacher_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @if ($teachers->isNotEmpty())
                @foreach($teachers as $teacher)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section class="boxs user_widget">
                            <div class="uw_header l-blue-blush">
                                <h4>{{$teacher->name}}</h4>
                                <div class="uw_image">
                                    <img class="img-circle" src="{{$img = $teacher->img !=null ? $teacher->img :"/images/no-image.png" }}" alt="User Avatar">
                                </div>

                            </div>
                            <div class="uw_footer">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <h5>{{$teacher->courses->count()}}</h5>
                                            <span>{{__("admin.courses")}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <h5>{{$teacher->author_subscribers->count()}}</h5>
                                            <span>{{__("admin.subscribers")}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="uw_description">
                                            <h5>{{$teacher->videos->count()}}</h5>
                                            <span>{{__("admin.videos")}}</span>
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
                                                        <div class="media-heading">{{__("admin.user.teacher")}}</div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <div class="media-img"><i class="icon-envelope"></i></div>
                                                    <div class="media-body">
                                                        <div class="media-heading">{{$teacher->email}}</div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <div class="media-img"><i class="fa fa-phone"></i></div>
                                                    <div class="media-body">
                                                        <div class="media-heading">{{$teacher->phone}}</div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <div class="media-img"><i class="{{$teacher->status == 1 ? "icon-check" : "icon-close"}}"></i></div>
                                                    <div class="media-body">
                                                        <div class="media-heading">{{$teacher->status == 1 ? __("admin.active") : __("admin.request")}}</div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>


                                    </div>

                                </section>

                                <div class="row">
                                    <div class="text-center">
                                        <a href="{{route("user.show",$teacher->id)}}" class="btn btn-raised btn-info">
                                            <i class="fa fa-eye"> </i>
                                            <small class="sm-none">{{__("admin.user.about_teacher")}}</small>

                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("user.edit",$teacher->id)}}" class="btn btn-warning btn-raised btn-round">
                                                <i class="fa fa-pencil-square">  </i>
                                                <small class="sm-none">{{__("admin.change")}}</small>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <form action="{{route("user.destroy",$teacher->id)}}" method="post">
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
                {{$teachers->links()}}
            @else
                <h2>{{__("admin.no_teacher")}}</h2>
            @endif

        </div>


    </div>
    <a href="{{route("user.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>

@endsection
