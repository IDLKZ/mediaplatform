@extends('admin.layout')
@section('content')
            <!-- row -->
            <a href="{{route("user.show",$id)}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
            <div class="row">
                @if ($subscribers->isNotEmpty())
                    @foreach($subscribers as $subscriber)
                        <div class="col-md-6 col-sm-12 p-10">
                            <div class="col-md-12 subscriber-card bg-white p-sm-10">
                                <div class="dropdown absolute-right">
                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <div class="ripple-container"></div></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{route("user.show",$subscriber->user_id)}}">
                                                {{__("admin.watch")}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route("user.edit",$subscriber->user_id)}}">
                                                {{__("admin.edit")}}
                                            </a>
                                        </li>

                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{route("deleteSubscriber",$subscriber->id)}}">
                                                {{__("admin.delete")}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-2 bg-gree p-10 lg-8" >
                                    <div class="subscriber-image centered-bg" style=" background-image: url('{{$subscriber->user->img}}')"></div>
                                </div>

                                <div class="col-md-8">
                                    <h4 class="text-blush">{{$subscriber->user->name}}</h4>
                                    <p>{{$subscriber->course->title}}    <span class="{{$subscriber->status == 1 ? "label label-success" : "label label-warning"}}">{{$subscriber->status == 1 ? __("admin.active") :  __("admin.request")}}</span></p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else

                @endif

                </div>
    <!--/ CONTENT -->

@endsection
