@extends('teacher.layout')
@section('content')
    <!-- bradcome -->
    <div class="row">

        <div class="col-md-4">
            <div class="profile-card-6"><img src="{{\Illuminate\Support\Facades\Auth::user()->img != null ? \Illuminate\Support\Facades\Auth::user()->img : "/images/no-image"}}" class="img img-responsive img-request-user">
                <div class="profile-name">
                    <br>{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <div class="profile-position">{{\Illuminate\Support\Facades\Auth::user()->role->title}}</div>
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
                                <a data-toggle="collapse" data-parent="#accordion" href="{{"#information".\Illuminate\Support\Facades\Auth::user()->id}}" aria-expanded="true" aria-controls="collapseOne" class="">
                                    <i class="fa fa-bars"></i>
                                    Основная информация
                                </a>
                            </h4>
                        </div>
                        <div id="{{"information".\Illuminate\Support\Facades\Auth::user()->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
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
                                        <div class="media-heading">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-img"><i class="fa fa-phone"></i></div>
                                    <div class="media-body">
                                        <div class="media-heading">{{\Illuminate\Support\Facades\Auth::user()->phone}}</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-img"><i class="{{\Illuminate\Support\Facades\Auth::user()->status == 1 ? "icon-check" : "icon-close"}}"></i></div>
                                    <div class="media-body">
                                        <div class="media-heading">{{\Illuminate\Support\Facades\Auth::user()->status == 1 ? "Активный" : "В заявке"}}</div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div>

            </section>
        </div>
        <div class="col-md-8">
            <div class="boxs-header">
                <h3 class="custom-font hb-blue">
                    <strong>Немного о себе </strong></h3>

            </div>
            <div class="boxs-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! \Illuminate\Support\Facades\Auth::user()->description !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


@endsection
