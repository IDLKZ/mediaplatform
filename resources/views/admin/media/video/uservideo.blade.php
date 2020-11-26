@extends('admin.layout')
@section('content')
    <!-- row -->
    <a href="{{route("admin-video.index")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <div class="row">
        @if ($uservideos->isNotEmpty())
            @foreach($uservideos as $uservideo)
            <div class="col-md-6 col-sm-12 p-10">
                <div class="col-md-12 subscriber-card bg-white p-sm-10">
                    <div class="dropdown absolute-right">
                        <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-ellipsis-v"></i>
                            <div class="ripple-container"></div></a>
                        <ul class="dropdown-menu pull-right">
                            <li class="divider"></li>
                            <li>
                                <a href="{{route("user.show",$uservideo->student->id)}}">
                                    <i class="fa fa-eye"></i>
                                    {{__("admin.watch")}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 bg-gree p-10 lg-8" >
                        <div class="subscriber-image centered-bg" style=" background-image: url('{{$uservideo->student->img}}')"></div>
                    </div>

                    <div class="col-md-8">
                        <h4 class="text-blush">{{$uservideo->student->name}}</h4>
                        <p>{{$uservideo->video->title}}    <span class="{{$uservideo->status == 1 ? "label label-success" : "label label-warning"}}">{{$uservideo->status == 1 ? __("admin.active") : __("admin.request")}}</span></p>
                    </div>

                </div>
            </div>
                {{$uservideos->links()}}
            @endforeach
        @else
            {{__("admin.not_found")}}

        @endif

    </div>
    <!--/ CONTENT -->

@endsection

