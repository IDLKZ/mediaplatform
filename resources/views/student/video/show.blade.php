@extends('student.layout')
@section('content')
    <div class="page dashboard-page">

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
                                        <strong>{{__('content.video_materials')}} </strong></h3>

                                </div>
                                <div class="accordion mb-3" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{__('student.description_video')}}
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                {!! $video->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    {{__('student.material_video')}}
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
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
                                                                        <a href="{{$link}}" target="_blank">{{__('content.links')}}</a>
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
                                <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                                    <a href="{{route("student.course.show", $video->course->alias)}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
                                    @csrf
                                    @if ($result)
                                        <a href="javascript:void (0)" class="btn btn-raised btn-warning">{{__('student.you_are_passed')}}</a>
                                    @else
                                        <a href="{{route("student.passExam",$video->alias)}}" class="btn btn-raised btn-success">{{__('student.pass_end')}}</a>
                                    @endif
                                </div>
                            </section>

                        </div>

                    </div>


                </section>
            </div>
        </div>
    </div>
@endsection


