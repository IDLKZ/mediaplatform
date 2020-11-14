@extends('admin.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            @if($videos->isNotEmpty())
            @foreach($videos as $video)
            <div class="col-md-3 col-sm-6 col-xs-12 mh-350">
                <div class="boxs project_widget">
                    <div class="pw_img">
                        <img class="img-responsive" src="{{\Merujan99\LaravelVideoEmbed\Services\LaravelVideoEmbed::getVimeoThumbanail($video->video_url)}}" style="width: 100%" alt="About the image">
                    </div>
                    <div class="pw_content">

                        <div class="pw_header">
                            <h6>
                                {{strlen($video->title) >20 ? mb_substr($video->title,0,20).".." : $video->title}}
                            </h6>
                            <small class="text-muted">{{strlen($video->course->title) > 20 ? mb_substr($video->course->title,0,12)."..." : $video->course->title }}  |  {{$video->created_at->diffForHumans()}}</small>
                        </div>
                        <div class="uw_footer pt-20">
                            <div class="text-center">
                                <ul class="controls list-group-flush p-0">
                                    <li class="dropdown list-group-item">
                                        <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                            <li>
                                                <a href="{{route("admin-video.show",$video->alias)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-eye"></i> Посмотреть </a>
                                            </li>
                                            <li>
                                                <a href="{{route("admin-video-subscriber",$video->alias)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-group"></i> Слушатели </a>
                                            </li>
                                            <li>
                                                <a href="{{route("admin-video-checked",$video->alias)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-check-circle-o"></i> Провереннные задания </a>
                                            </li>
                                            <li>
                                                <a href="{{route("admin-video-unchecked",$video->alias)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-warning"></i> Непровереннные задания </a>
                                            </li>
                                            <li>
                                                <a href="" role="button" tabindex="0" >
                                                    <i class="fa fa-question-circle"></i> Экзамен </a>
                                            </li>
                                            <li>
                                                <a href="{{route("admin-video-material",$video->alias)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-bookmark-o"></i> Материалы </a>
                                            </li>
                                            <li>
                                                <form  method="post" action="{{route('admin-video.destroy',$video->alias)}}">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button onclick="return confirm('Вы уверены, удаление видео приведет к удалению результатов!')" role="button" tabindex="0" class="btn btn-a">
                                                        <i class="fa fa-bitbucket"></i> Удалить </button>
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
    <a href="{{route("admin-video.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>
@endsection

