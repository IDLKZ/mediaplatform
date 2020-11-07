@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Список менеджеров</h1>
                    <small class="text-muted">Список всех менеджеров</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
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
                                        <span>Видео</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <h5>{{$student->subscribers->count()}}</h5>
                                        <span>Подписок</span>
                                    </div>
                                </div>

                            </div>
                            <section class="boxs boxs-simple">
                                <div class="boxs-header">
                                    <h3 class="custom-font hb-green">
                                        <strong>Информация</strong></h3>
                                </div>
                                <div class="boxs-body">
                                    <div class="panel panel-default">
                                        <div class="panel-heading boxs-header bg-green" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="{{"#information".$student->id}}" aria-expanded="true" aria-controls="collapseOne" class="">
                                                    <i class="fa fa-bars"></i>
                                                    Основная информация
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="{{"information".$student->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                            <ul class="media-list feeds_widget m-0">
                                                <li class="media">
                                                    <div class="media-img"><i class="fa fa-user-circle"></i></div>
                                                    <div class="media-body">
                                                        <div class="media-heading">Тьютор</div>
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
                                                        <div class="media-heading">{{$student->status == 1 ? "Активный" : "В заявке"}}</div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>


                                </div>
                                <div class="boxs-header">
                                    <h3 class="custom-font hb-blue">
                                        <strong>Немного о себе </strong></h3>

                                </div>
                                <div class="boxs-body">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading boxs-header bg-info" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="{{"#info".$student->id}}" aria-expanded="true" aria-controls="collapseOne" class="">
                                                        <i class="fa fa-bars"></i>
                                                        О себе
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="{{"info".$student->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                                <div class="panel-body">
                                                    {!! $student->description !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>

                            <div class="row">
                                <div class="text-center">
                                    <a href="{{route("user.show",$student->id)}}" class="btn btn-raised btn-info">
                                        <i class="fa fa-eye"> </i>
                                        <small class="sm-none">О тьюторе</small>

                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <a href="{{route("user.edit",$student->id)}}" class="btn btn-warning btn-raised btn-round">
                                            <i class="fa fa-pencil-square">  </i>
                                            <small class="sm-none">Изменить</small>
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
                                                <small class="sm-none">Удалить</small>
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
        </div>


    </div>
    <a href="{{route("user.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>

@endsection
