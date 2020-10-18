@extends('teacher.layout')
@section('content')
    <a href="{{route("video.index")}}" class="btn btn-raised btn-info">Назад</a>
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
                        <video controls autoplay="false" height="500px" width="100%">
                            <source src="{{ route('watch', $video->id) }}" >
                        </video>
                    </div>
                    <div class="col-md-12">
                        <section class="boxs">
                            <div class="boxs-header">
                                <h3 class="custom-font hb-blue">
                                    <strong>Материалы и описание </strong></h3>

                            </div>
                            <div class="boxs-body">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Описание и объяснение видео</a>
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
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Материалы для видео</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                            <div class="panel-body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">--}}
{{--                                <button type="submit" class="btn btn-raised btn-success">Видеоурок усвоил!</button>--}}
{{--                                <button type="reset" class="btn btn-raised btn-warning">Вернуться обратно</button>--}}
{{--                            </div>--}}
                        </section>

                    </div>

                </div>


            </section>
        </div>
    </div>

@endsection

