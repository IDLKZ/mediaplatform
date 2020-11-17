@extends('teacher.layout')
@section('content')
    <a href="" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>Поиск пользователя</strong></h3>
                </div>
                <div class="boxs-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="my-form" action="{{route("teacher-search-media-result")}}" method="get" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Искать в</label>
                            <div class="col-sm-9">
                                <select name="type" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="course">Курсы</option>
                                    <option value="video">Видео</option>
                                    <option value="material">Материалы</option>
                                    <option value="examination">Экзамены</option>
                                </select>
                            </div>
                        </div>
                        <div class="boxs-body">
                            <div class="input-group search-bar">
                                <div class="form-group is-empty">
                                    <input type="text" class="form-control " name="query" placeholder="Введите наименование..."><span class="material-input"></span></div>
                                <span class="input-group-btn">
										<button type="submit" class="btn btn-raised btn-default" type="button">
											<i class="fa fa-search"></i> Искать!</button>
									</span>
                            </div>
                        </div>

                    </form>
                </div>

            </section>
        </div>
    </div>
    @if (isset($searchResults) && isset($searchterm))
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font text-success">
                            <strong>Результаты поиска по слову "{{$searchterm}}"</strong></h3>
                    </div>
                    <div class="boxs-body">
                        @if ($searchResults->isNotEmpty())
                            @if ($searchtype == "course")
                                <h4>Поиск по Курсам</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width:60px;">Изображение</th>
                                            <th>Наименование</th>
                                            <th>Автор</th>
                                            <th>Подзаголовок</th>
                                            <th>Язык курса</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td>
                                                    <img class="rounded-circle" src="{{$result->img != null ? $result->img : "/images/no-image.png"}}" alt="user" width="40"> </td>
                                                <td>
                                                    <a>{{$result->title}}</a>
                                                </td>
                                                <td>
                                                    <p>{{$result->author->name}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->subtitle}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->language->title}}</p>
                                                </td>
                                                <td>
                                                    <ul class="controls list-group-flush">
                                                        <li class="dropdown list-group-item">
                                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-cog"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp list-unstyled">

                                                                <li>
                                                                    <a href="{{route("course.show",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-eye"></i> Посмотреть </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("course.edit",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-pencil"></i> Редактировать </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("course-subscriber",$result->id)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-user-plus"></i> Подписчики </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("course-request",$result->id)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-question-circle"></i> Заявки </a>
                                                                </li>
                                                                <li>
                                                                    <form  method="post" action="{{route('course.destroy',$result->alias)}}">
                                                                        @method("DELETE")
                                                                        @csrf
                                                                        <button onclick="return confirm('Вы уверены, удаление курса приведет к удалению видео!')" role="button" tabindex="0" class="btn btn-a">
                                                                            <i class="fa fa-bitbucket"></i> Удалить </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$searchResults->links()}}
                                </div>
                            @endif
                            @if ($searchtype == "video")
                                <h4>Поиск по Видео</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width:60px;">Изображение</th>
                                            <th>Наименование</th>
                                            <th>Курс</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td>
                                                    <img class="rounded-circle" src="{{\Merujan99\LaravelVideoEmbed\Services\LaravelVideoEmbed::getVimeoThumbanail($result->video_url)}}" alt="user" width="40"> </td>
                                                <td>
                                                    <a>{{$result->title}}</a>
                                                </td>
                                                <td>
                                                    <p>{{$result->course->title}}</p>
                                                </td>
                                                <td>
                                                    <ul class="controls list-group-flush p-0">
                                                        <li class="dropdown list-group-item">
                                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-cog"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                                                <li>
                                                                    <a href="{{route("video.show",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-eye"></i> Посмотреть </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("video-subscriber",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-group"></i> Слушатели </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("video-result-checked",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-check-circle-o"></i> Провереннные задания </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("video-result-unchecked",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-warning"></i> Непровереннные задания </a>
                                                                </li>
                                                                <li>
                                                                    <a href="" role="button" tabindex="0" >
                                                                        <i class="fa fa-question-circle"></i> Экзамен </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("video-material",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-bookmark-o"></i> Материалы </a>
                                                                </li>
                                                                <li>
                                                                    <form  method="post" action="{{route('video.destroy',$result->alias)}}">
                                                                        @method("DELETE")
                                                                        @csrf
                                                                        <button onclick="return confirm('Вы уверены, удаление видео приведет к удалению результатов!')" role="button" tabindex="0" class="btn btn-a">
                                                                            <i class="fa fa-bitbucket"></i> Удалить </button>
                                                                    </form>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$searchResults->links()}}
                                </div>
                            @endif

                            @if ($searchtype == "material")
                                <h4>Поиск по Материалам</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Видео</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td>
                                                    <a>{{$result->title}}</a>
                                                </td>
                                                <td>
                                                    <p>{{$result->video->title}}</p>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                            <div class="ripple-container"></div></a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a  href="{{route("material",$result->id)}}">
                                                                    {{__('content.download')}}
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a  href="{{route("material.edit",$result->id)}}">
                                                                    {{__('content.edit')}}
                                                                </a>
                                                            </li>

                                                            <li class="divider"></li>
                                                            <li>
                                                                <form action="{{route('material.destroy',$result->id)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                                                                        {{__('content.delete')}}</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$searchResults->links()}}
                                </div>
                            @endif
                            @if ($searchtype == "examination")
                                <h4>Поиск по Экзаменам</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Видео</th>
                                            <th>Автор</th>
                                            <th>Тип экзамена</th>
                                            <th>Наименование вопросника</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td>
                                                    <a>{{$result->title}}</a>
                                                </td>
                                                <td>
                                                    <p>{{$result->video->title}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->author->name}}</p>
                                                </td>
                                                <td>
                                                    @if ($result->quiz_id != null)
                                                        <p>Тест</p>
                                                    @elseif ($result->review_id != null)
                                                        <p>Опрос</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($result->quiz_id != null)
                                                        <p>{{$result->quiz->title}}</p>
                                                    @elseif ($result->review_id != null)
                                                        <p>{{$result->review->title}}</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <ul class="controls list-group-flush p-0">
                                                        <li class="dropdown list-group-item">
                                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-cog"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                                                <li>
                                                                    <a href="{{route('examination.edit',$result->id)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-pencil"></i> Изменить </a>
                                                                </li>
                                                                <li>
                                                                    <form  method="post" action="{{route('examination.destroy',$result->id)}}">
                                                                        @method("DELETE")
                                                                        @csrf
                                                                        <button onclick="return confirm('Вы уверены?')" role="button" tabindex="0" class="btn btn-a">
                                                                            <i class="fa fa-bitbucket"></i> Удалить </button>
                                                                    </form>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$searchResults->links()}}
                                </div>
                            @endif
                        @else
                            <h3 class="text-danger"> Ничего не найдено</h3>
                        @endif
                    </div>

                </section>
            </div>
        </div>
    @endif


@endsection



