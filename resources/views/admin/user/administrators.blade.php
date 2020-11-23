@extends('admin.layout')
@section('content')
    <a href="{{route("admin-users")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.user.all_admins")}}</h1>
                    <small class="text-muted">{{__("admin.user.admin_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @if ($administrators->isNotEmpty())
                @foreach($administrators as $admin)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section class="boxs user_widget">
                            <div class="uw_header l-green-blush">
                                <h5>{{$admin->name}}</h5>
                                <div class="uw_image">
                                    <img class="img-circle" src="{{$img = $admin->img !=null ? $admin->img :"/images/no-image.png" }}" alt="User Avatar">
                                </div>

                            </div>
                            <div class="uw_footer">
                                <section class="boxs boxs-simple">
                                    <div class="boxs-header">
                                        <h3 class="custom-font hb-green">
                                            <strong>{{__("admin.info")}}</strong></h3>
                                    </div>
                                    <div class="boxs-body">
                                        <ul class="media-list feeds_widget m-0">
                                            <li class="media">
                                                <div class="media-img"><i class="fa fa-user-circle"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{__("user.admin")}}</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="icon-envelope"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{$admin->email}}</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="fa fa-phone"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{$admin->phone}}</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="{{$admin->status == 1 ? "icon-check" : "icon-close"}}"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">{{$admin->status == 1 ? __("admin.active") : __("admin.request")}}</div>
                                                </div>
                                            </li>

                                        </ul>

                                    </div>
                                </section>

                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("user.edit",$admin->id)}}" class="btn btn-warning btn-raised btn-round">
                                                <i class="fa fa-pencil-square">  </i>
                                                <small class="sm-none">{{__("admin.change")}}</small>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-sm-4 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <form action="{{route("user.destroy",$admin->id)}}" method="post">
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
                {{$administrators->links()}}
                @else
                <h2>{{__("admin.no_admin")}}</h2>
            @endif

        </div>


    </div>
    <a href="{{route("user.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>

@endsection
