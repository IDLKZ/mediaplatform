@extends('admin.layout')
@section('content')
    <a href="{{route("admin-search")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.search_user")}}</strong></h3>
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
                    <form id="my-form" action="{{route("admin-search-media-result")}}" method="get" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Искать в</label>
                            <div class="col-sm-9">
                                <select name="type" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="course">{{__("admin.courses")}}</option>
                                    <option value="video">{{__("admin.video")}}</option>
                                    <option value="material">{{__("admin.materials")}}</option>
                                    <option value="examination">{{__("admin.exams")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="boxs-body">
                            <div class="input-group search-bar">
                                <div class="form-group is-empty">
                                    <input type="text" class="form-control " name="query" placeholder="{{__("admin.search_key")}}..."><span class="material-input"></span></div>
                                <span class="input-group-btn">
										<button type="submit" class="btn btn-raised btn-default" type="button">
											<i class="fa fa-search"></i> {{__("admin.search")}}!</button>
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
                            <strong>{{__("admin.search_word")}} "{{$searchterm}}"</strong></h3>
                    </div>
                    <div class="boxs-body">
                        @if ($searchResults->isNotEmpty())
                            @if ($searchtype == "course")
                                 <h4>{{__("admin.search_course")}}</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width:60px;">{{__("admin.img")}}</th>
                                            <th>{{__("admin.course_title")}}</th>
                                            <th>{{__("admin.author")}}</th>
                                            <th>{{__("admin.course_subtitle")}}</th>
                                            <th>{{__("admin.language")}}</th>
                                            <th>{{__("admin.action")}}</th>
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
                                                                    <a href="{{route("admin-course.show",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-eye"></i> {{__("admin.watch")}} </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("admin-course-videos",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-vimeo-square"></i> {{__("admin.videos")}} </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("admin-course.edit",$result->alias)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-pencil"></i> {{__("admin.edit")}} </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("admin-course-subscribers",$result->id)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-user-plus"></i> {{__("admin.subscribers")}} </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route("admin-course-unconfirmed",$result->id)}}" role="button" tabindex="0" >
                                                                        <i class="fa fa-question-circle"></i> {{__("admin.request")}} </a>
                                                                </li>
                                                                <li>
                                                                    <form  method="post" action="{{route('admin-course.destroy',$result->alias)}}">
                                                                        @method("DELETE")
                                                                        @csrf
                                                                        <button onclick="return confirm('Вы уверены, удаление курса приведет к удалению видео!')" role="button" tabindex="0" class="btn btn-a">
                                                                            <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
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
                                    <h4>{{__("admin.search_video")}}</h4>
                                    <div class="body table-responsive members_profiles">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="width:60px;">{{__("admin.img")}}</th>
                                                <th>{{__("admin.video_title")}}</th>
                                                <th>{{__("admin.course")}}</th>
                                                <th>{{__("admin.action")}}</th>
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
                                                                        <a href="{{route("admin-video.show",$result->alias)}}" role="button" tabindex="0" >
                                                                            <i class="fa fa-eye"></i> {{__("admin.watch")}} </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route("admin-video-subscriber",$result->alias)}}" role="button" tabindex="0" >
                                                                            <i class="fa fa-group"></i> {{__("admin.subscribers")}} </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route("admin-video-checked",$result->alias)}}" role="button" tabindex="0" >
                                                                            <i class="fa fa-check-circle-o"></i> {{__("admin.checked_result")}} </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route("admin-video-unchecked",$result->alias)}}" role="button" tabindex="0" >
                                                                            <i class="fa fa-warning"></i> {{__("admin.unchecked_result")}} </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{route("admin-video-material",$result->alias)}}" role="button" tabindex="0" >
                                                                            <i class="fa fa-bookmark-o"></i> {{__("admin.materials")}} </a>
                                                                    </li>
                                                                    <li>
                                                                        <form  method="post" action="{{route('admin-video.destroy',$result->alias)}}">
                                                                            @method("DELETE")
                                                                            @csrf
                                                                            <button onclick="return confirm({{__("admin.question")}})" role="button" tabindex="0" class="btn btn-a">
                                                                                <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
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
                                    <h4>{{__("admin.search_material")}}</h4>
                                    <div class="body table-responsive members_profiles">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>{{__("admin.title")}}</th>
                                                <th>{{__("admin.video")}}</th>
                                                <th>{{__("admin.actionadmin")}}</th>
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
                                                                        {{__('admin.download')}}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a  href="{{route("admin-material.edit",$result->id)}}">
                                                                        {{__('admin.edit')}}
                                                                    </a>
                                                                </li>

                                                                <li class="divider"></li>
                                                                <li>
                                                                    <form action="{{route('admin-material.destroy',$result->id)}}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button onclick="return confirm({{__("admin.question")}})" type="submit" class="btn btn-danger">
                                                                            {{__('admin.delete')}}</button>
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
                                    <h4>{{__("admin.search_exam")}}</h4>
                                    <div class="body table-responsive members_profiles">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>{{__("admin.title")}}</th>
                                                <th>{{__("admin.video")}}</th>
                                                <th>{{__("admin.author")}}</th>
                                                <th>{{__("admin.exam_type")}}</th>
                                                <th>{{__("admin.title")}}</th>
                                                <th>{{__("admin.action")}}</th>
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
                                                            <p>{{__("admin.review")}}</p>
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
                                                                        <form  method="post" action="{{route('admin-examination.destroy',$result->id)}}">
                                                                            @method("DELETE")
                                                                            @csrf
                                                                            <button onclick="return confirm({{__("admin.question")}})" role="button" tabindex="0" class="btn btn-a">
                                                                                <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
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
                            <h3 class="text-danger"> {{__("admin.not_found")}}</h3>
                        @endif
                    </div>

                </section>
            </div>
        </div>
    @endif


@endsection



