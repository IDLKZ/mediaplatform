@extends('admin.layout')

@section("content")
    <!--CONTENT  -->

    <div class="page profile-page">
        <section class="boxs">
            <div class="boxs-header">
                <h3 class="custom-font hb-green">
                    <strong>Открытые курсы</strong></h3>

            </div>
            <div class="boxs-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                       @foreach ($subscribers as $subscriber)
                            <div class="panel-heading m-10 l-blush" role="tab" id="headingOne">
                                <ul class="inbox-widget list-unstyled clearfix ">
                                    <li class="inbox-inner"> <a data-toggle="collapse" data-parent="#accordion" href="#{{$subscriber->course->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                            <div class="inbox-item">
                                                <div class="inbox-img"> <img src="{{$subscriber->course->img}}" alt=""> </div>
                                                <div class="inbox-item-info">
                                                    <p class="text-white">{{$subscriber->course->title}}</p>
                                                </div>
                                            </div>
                                        </a> </li>
                                </ul>
                            </div>




                            <div id="{{$subscriber->course->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Статус</th>
                                            <th colspan="3">Видео</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subscriber->videos as $video)
                                            @if($video->course_id == $subscriber->course->id)
                                                @if(in_array($video->id,$subscriber->uservideo->pluck("video_id")->toArray()))

                                                    <tr>
                                                        <td><span class="list-icon linkedin"><i class="fa fa-unlock"></i></span>
                                                        </td>
                                                        <td colspan="3"><span class="list-name">{{$video->title}}</span>
                                                            <span class="text-muted"></span>
                                                        </td>
                                                        <td> <div class="dropdown">
                                                                <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                    <div class="ripple-container"></div></a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="http://mediaportal.kz/admin/admin-video/vvodnyy-urok">
                                                                            Смотреть
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="http://mediaportal.kz/admin/admin-video/vvodnyy-urok/edit">
                                                                            Редактировать
                                                                        </a>
                                                                    </li>

                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <form action="http://mediaportal.kz/admin/admin-video/vvodnyy-urok" method="post">
                                                                            <input type="hidden" name="_token" value="xoVlFx6RIJQRkH9vPoC3jEhEMJ2G5Bh2achEkNgV">                                                        <input type="hidden" name="_method" value="DELETE">                                                        <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                                                                                Удалить</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div></td></td>

                                                    </tr>

                                                @else
                                                    <tr>
                                                        <td><span class="list-icon linkedin"><i class="fa fa-lock"></i></span>
                                                        </td>
                                                        <td colspan="3"><span class="list-name">{{$video->title}}</span>
                                                            <span class="text-muted"></span>
                                                        </td>
                                                        <td> <div class="dropdown">
                                                                <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                    <div class="ripple-container"></div></a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="http://mediaportal.kz/admin/admin-video/vvodnyy-urok">
                                                                            Смотреть
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="http://mediaportal.kz/admin/admin-video/vvodnyy-urok/edit">
                                                                            Редактировать
                                                                        </a>
                                                                    </li>

                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <form action="http://mediaportal.kz/admin/admin-video/vvodnyy-urok" method="post">
                                                                            <input type="hidden" name="_token" value="xoVlFx6RIJQRkH9vPoC3jEhEMJ2G5Bh2achEkNgV">                                                        <input type="hidden" name="_method" value="DELETE">                                                        <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                                                                                Удалить</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div></td></td>
                                                    </tr>
                                                    @endif
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                       @endforeach

                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
