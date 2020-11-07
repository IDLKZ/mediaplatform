@extends('admin.layout')
@section('content')
            <!-- row -->
            <a href="{{route("user.show",$id)}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
            <div class="row">
                @foreach($subscribers as $subscriber)
                    <div class="col-md-6 col-sm-12 p-10">
                        <div class="col-md-12 subscriber-card bg-white p-sm-10">
                            <div class="dropdown absolute-right">
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
