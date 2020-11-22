@extends('student.layout')
@section('content')
    <div class="col-md-4 col-sm-12">
        @include('student.left_sidebar')
    </div>
    <div class="col-md-8 col-sm-12">
        <section class="boxs">
            <div class="boxs-header">
                <h3 class="custom-font hb-green">
                    <strong>Открыть доступ к видеоуроку</strong></h3>
            </div>
            <div class="boxs-body">
                <form id="my-form" method="post" enctype="multipart/form-data" action="{{route('get-open-video')}}" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group is-empty">
                        <label for="inputName" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <select name="video_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                @foreach($allvideos as $video)
                                    @if(!in_array($video->id,$uservideos))
                                    <option value="{{$video->id}}">{{$video->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <span class="material-input"></span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-raised btn-primary">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection


