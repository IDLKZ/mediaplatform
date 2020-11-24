@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <a href="{{route("teacher-users")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
        <div class="row">
            @if($videos->isNotEmpty())
                @foreach($videos as $video)
                    <div class="col-md-3 col-sm-6 col-xs-12 mh-350">
                        <div class="boxs project_widget">
                            <div class="pw_img">
                                <img class="img-responsive" src="{{\Merujan99\LaravelVideoEmbed\Services\LaravelVideoEmbed::getYoutubeThumbnail($video->video_url)}}" style="width: 100%; height: 200px" alt="About the image">
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
                                                        <a href="{{route("video.show",$video->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-eye"></i> {{__("admin.watch")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("video-subscriber",$video->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-group"></i> {{__("admin.subscribers")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("video-result-checked",$video->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-check-circle-o"></i> {{__("admin.checked_result")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("video-result-unchecked",$video->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-warning"></i> {{__("admin.unchecked_result")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("video-material",$video->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-bookmark-o"></i> {{__("admin.materials")}} </a>
                                                    </li>
                                                    <li>
                                                        <form  method="post" action="{{route('video.destroy',$video->alias)}}">
                                                            @method("DELETE")
                                                            @csrf
                                                            <button onclick="return confirm('{{__("admin.question")}}')" role="button" tabindex="0" class="btn btn-a">
                                                                <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
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
                {{$videos->links()}}
            @else
                <h3>
                    {{__("admin.no_videos")}}
                </h3>
            @endif
        </div>
    </div>

@endsection
