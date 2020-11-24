@extends('teacher.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('admin.edit_video')}}</strong></h3>
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
                    <form id="my-form" action="{{route("video.update",$video->alias)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                       @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.course')}}</label>
                            <div class="col-sm-9">
                                <select name="course_id" class="form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="{{$video->course_id}}">{{$video->course->title}}</option>
                                @foreach($courses as $course)
                                            @if ($video->course_id == $course->id)
                                                <option value="{{$course->id}}">{{$course->title}}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.course_title')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" value="{{$video->title}}" placeholder="{{__('admin.course_title')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.course_description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $video->description !!}
                                </textarea>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.video')}}</label>
                            <div class="col-sm-9">
                                <input name="video_url" type="text" class="form-control" placeholder="Ссылка на Youtube" required value="{{$video->video_url}}">
                            </div>
                        </div>

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">

                            <button type="submit" id="btn-submit" class="btn btn-raised btn-info">{{__('admin.edit')}}</button>
                            <a href="{{route("video.index")}}" class="btn btn-raised btn-primary">{{__('admin.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

