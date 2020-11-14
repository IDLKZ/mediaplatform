@extends('admin.layout')
@section('content')
    <!-- row -->
    <a href="" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <div class="row">
        @foreach($subscribers as $subscriber)
            <div class="col-md-6 col-sm-12 p-10">
                <div class="col-md-12 subscriber-card bg-white p-sm-10">
                    <div class="dropdown absolute-right">
                        <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-ellipsis-v"></i>
                            <div class="ripple-container"></div></a>
                        <ul class="dropdown-menu pull-right">
                            @if ($subscriber->status == 1)
                                <li>
                                    <a href="{{route("admin-subscribe-action",$subscriber->id)}}">
                                        <i class="icon-close"></i>
                                        Отказать в заявке
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route("admin-subscribe-action",$subscriber->id)}}">
                                        <i class="fa fa-check-circle"></i>
                                        Одобрить
                                    </a>
                                </li>
                            @endif



                            <li class="divider"></li>
                            <li>
                                <a href="{{route("admin-subscribe-delete",$subscriber->id)}}">
                                    <i class="fa fa-bitbucket"></i>
                                    Удалить
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 bg-gree p-10 lg-8" >
                        <div class="subscriber-image centered-bg" style=" background-image: url('{{$subscriber->user->img}}')"></div>
                    </div>

                    <div class="col-md-8">
                        <h4 class="text-blush">{{$subscriber->user->name}}</h4>
                        <p>{{$subscriber->course->title}}    <span class="{{$subscriber->status == 1 ? "label label-success" : "label label-warning"}}">{{$subscriber->status == 1 ? "Одобрен" : "Заявка"}}</span></p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <!--/ CONTENT -->

@endsection
