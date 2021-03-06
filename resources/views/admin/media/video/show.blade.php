@extends('admin.layout')
@section('content')
    <a href="{{route("admin-video.index")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{$video->count . "." .$video->title}}({{$video->course->title}})</strong></h3>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-5">
                        {!! $file !!}
                    </div>
                    <div class="col-md-12">
                        <section class="boxs">
                            <div class="boxs-header">
                                <h3 class="custom-font hb-blue">
                                    <strong>{{__('admin.materials')}} </strong></h3>

                            </div>
                            <div class="boxs-body">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">{{__('content.video_explanation')}}</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                               {!! $video->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    {{__('admin.material')}}</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                            <div class="panel-body">
                                                <ul class="media-list feeds_widget m-0">
                                                    @foreach($video->materials as $material)
                                                    <li class="media">
                                                        <div class="media-img">
                                                           <i class="fa fa-info-circle"></i>
                                                            @if ($material->file)
                                                                <a href="{{route("material",$material->id)}}" download><i class="fa fa-download"></i></a>
                                                            @endif

                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">{{$material->title}} <small class="pull-right text-muted">{{$material->type}}</small></div>
                                                           @if ($material->links)
                                                                @foreach($material->links as $link)
                                                                    <a href="{{$link}}" target="_blank">{{__('admin.links')}}</a>
                                                                @endforeach
                                                           @endif

                                                        </div>
                                                    </li>
                                                    @endforeach


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>

                </div>


            </section>
        </div>
    </div>

@endsection

