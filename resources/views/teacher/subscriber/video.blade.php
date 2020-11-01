@extends('teacher.layout')
@section('content')
    <a href="{{route("confirmed_subscribers")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>ОТКРЫТЬ</strong> ДОСТУП К ВИДЕО</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="boxs-body">
                    <form id="my-form" action="{{route("saveAccessVideo")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="subscribe_id" value="{{$subscriber->id}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Автор курса</label>
                            <div class="col-sm-9">
                                <p>{{$subscriber->author->name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Слушатель курса</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="student_id" value="{{$subscriber->user->id}}">
                                <p>{{$subscriber->user->name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс</label>
                            <div class="col-sm-9">
                                <p>{{$subscriber->course->title}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Видео</label>
                            <div class="col-sm-9">
                                <select name="video_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($subscriber->videos as $video)
                                        <option value="{{$video->id}}">{{$video->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-default">Сохранить</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection
