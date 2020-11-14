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
                        <div class="uw_footer ">
                            <div class="row">
                                <div class="col-sm-6 col-xs-4 border-right">
                                    <div class="uw_description text-center">
                                        <a class="btn btn-raised btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-4 border-right">
                                    <div class="uw_description text-center">
                                        <a class="btn btn-raised btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-4">
                                    <div class="uw_description text-center">
                                        <a class="btn btn-raised btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

