@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <a href="{{route("admin-request")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>

        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.requests")}}</h1>
                    <small class="text-muted">{{__("admin.request_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="profile-card-4 text-center"><img src="{{$user->img != null ? $user->img : "/images/no-image.png"}}" class="img img-responsive img-request-user">
                        <div class="profile-content">
                            <div class="profile-name">{{$user->name}}
                                <p>{{$user->role->title}}</p>
                            </div>
                            <div class="profile-description">
                                <div class="panel panel-default">
                                    <div class="panel-heading boxs-header bg-green" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="{{"#information".$user->id}}" aria-expanded="true" aria-controls="collapseOne" class="">
                                                <i class="fa fa-bars"></i>
                                                {{__("admin.main.info")}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{"information".$user->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                        <ul class="media-list feeds_widget m-0">

                                            <li class="media">
                                                <div class="media-img"><i class="icon-envelope"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{$user->email}}</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="fa fa-phone"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{$user->phone}}</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="{{$user->status == 1 ? "icon-check" : "icon-close"}}"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{$user->status == 1 ? __('admin.active') : __('admin.request')}}</div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <a href="{{route("user.edit",$user->id)}}" class="btn btn-warning btn-raised btn-round">
                                            <i class="fa fa-pencil-square">  </i>
                                            <small class="sm-none">{{__('admin.change')}}</small>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <form action="{{route("user.destroy",$user->id)}}" method="post">
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
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>



@endsection



