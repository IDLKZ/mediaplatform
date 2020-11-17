@extends('teacher.layout')
@section('content')
    <!-- row -->
    <div class="page page-content">
        <a href="" class="btn btn-raised btn-info">{{__('content.back')}}</a>
        <div class="row">
            @foreach($results as $result)
                <div class="col-md-4 mh-350 p-10">
                    <section class="boxs">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-cyan">
                                <strong>Результат {{$result->student->name}}</strong></h3>
                        </div>
                        <div class="boxs-body">
                            <ul class="inbox-widget list-unstyled clearfix">
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="{{$str = $result->status == 1 ? "fa fa-check-circle text-success" : ($result->status == 0 ? "fa fa fa-clock-o text-warning" : "fa fa-warning text-danger")}}"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$str = $result->status == 1 ? "Пройдено" : ($result->status == 0 ? "Не проверено" : "Пересдача")}}</p>
                                                <p class="inbox-message">Статус</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"> <img src="{{$img = $result->student->img !=null ? $result->student->img :"/images/no-image.png" }}" alt=""> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->student->name}}</p>
                                                <p class="inbox-message">Студент</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"> <img src="{{$img = $result->author->img !=null ? $result->author->img :"/images/no-image.png" }}" alt=""> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->author->name}}</p>
                                                <p class="inbox-message">Тьютор</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"> <img src="{{$img = $result->course->img !=null ? $result->course->img :"/images/no-image.png" }}" alt=""> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->course->title}}</p>
                                                <p class="inbox-message">Курс</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="fa fa-video-camera"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$result->video->title}}</p>
                                                <p class="inbox-message">Видеоурок</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="fa fa-clock-o"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{\Carbon\Carbon::parse($result->passed_day)->diffForHumans()}}</p>
                                                <p class="inbox-message">Время сдачи</p>
                                            </div>
                                        </div>
                                    </a> </li>
                                <li class="inbox-inner"> <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-img"><i style="font-size: 40px" class="fa fa-clock-o"></i> </div>
                                            <div class="inbox-item-info">
                                                <p class="author">{{$str = $result->checked_day != null ? \Carbon\Carbon::parse($result->checked_day)->diffForHumans() : "Не проверено"}}</p>
                                                <p class="inbox-message">Время проверки</p>
                                            </div>
                                        </div>
                                    </a> </li>

                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 border-right">
                                <div class="uw_description">
                                    <a href="{{route("teacher.showResult",$result->id)}}" class="btn btn-warning btn-raised btn-round">
                                        <i class="fa fa-pencil-square">  </i>
                                        <small class="sm-none">Изменить</small>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-6 col-xs-6 border-right">
                                <div class="uw_description">
                                    <a href="{{route("teacher.deleteResult",$result->id)}}" class="btn btn-danger btn-raised btn-round">
                                        <i class="fa fa-close">  </i>
                                        <small class="sm-none">Удалить</small>
                                    </a>
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

