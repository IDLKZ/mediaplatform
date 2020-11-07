@extends('admin.layout')

@section("content")
    <!--CONTENT  -->
    <div class="page profile-page">
        <!-- page content -->
        <div class="pagecontent">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="boxs">
                        <div class="profile-header">
                            <div class="profile_info">
                                <div class="profile-image">
                                    <img class="h-100" src="{{$img = $user->img !=null ? $user->img :"/images/no-image.png" }}" alt="">
                                </div>
                                <h4 class="mb-0"><strong>{{$user->name}}</strong></h4>
                                <span class="text-muted">Тьютор</span>
                                <div class="mt-10">

                                    <a href="{{route("user.edit",$user->id)}}" class="btn btn-warning btn-raised btn-round btn-sm">
                                        <i class="fa fa-pencil-square">  </i>
                                        <small class="sm-none">Изменить</small>
                                    </a>
                                    <form action="{{route("user.destroy",$user->id)}}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger btn-raised btn-round btn-sm">
                                            <i class="fa fa-bitbucket pr-2">  </i>
                                            <small class="sm-none">Удалить</small>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="profile-sub-header">
                            <div class="box-list">
                                <ul class="text-center">
                                    <li>
                                        <a href="{{route("admin-teacher-course",$user->id)}}" class="">
                                            <i class="fa fa-inbox"></i>
                                            <p>
                                                Мои курсы
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route("admin-teacher-subscriber",$user->id)}}" class="">
                                            <i class="fa fa-users"></i>
                                            <p>
                                                Подписчики
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route("admin-teacher-material",$user->id)}}">
                                            <i class="fa fa-paperclip"></i>
                                            <p>Материалы</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-tasks "></i>
                                            <p>Результаты</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="row clearfix">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="boxs mini-social">
                            <div class="boxs-body">
                                <div class="s-icon text-blush">
                                    <i class="fa fa-video-camera"></i>
                                </div>
                                <div class="s-detail">
                                    <div class="like"><span>{{$user->courses->count()}}</span></div>
                                    <span>Курсов</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="boxs mini-social">
                            <div class="boxs-body">
                                <div class="s-icon text-greensea">
                                    <i class="fa fa-user-circle-o"></i>
                                </div>
                                <div class="s-detail">
                                    <div class="like"><span>{{$user->author_subscribers->count()}}</span></div>
                                    <span>Подписчики</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="boxs mini-social">
                            <div class="boxs-body">
                                <div class="s-icon text-blue">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="s-detail">
                                    <div class="like"><span>{{$user->materials->count()}}</span></div>
                                    <span>Материалов</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="boxs mini-social">
                            <div class="boxs-body">
                                <div class="s-icon text-warning">
                                    <i class="fa fa-question-circle"></i>
                                </div>
                                <div class="s-detail">
                                    <div class="like"><span>{{$user->examinations->count()}}</span></div>
                                    <span>Задач</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <section class="boxs boxs-simple">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-green">
                                <strong>Информация</strong></h3>
                        </div>
                        <div class="boxs-body">
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
                                        <div class="media-heading">{{$user->status == 1 ? "Активный" : "В заявке"}}</div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </section>

                </div>
                <div class="col-md-8 col-sm-12">
                    <section class="boxs boxs-simple">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-green">
                                <strong>О себе</strong></h3>
                        </div>
                        <div class="boxs-body p-10">
                            {!! $user->description !!}
                        </div>
                        <!-- /boxs body -->
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
    <!--/ CONTENT -->


