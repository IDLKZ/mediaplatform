@extends('admin.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('content.new_video')}}</strong></h3>
                </div>
                <div class="boxs-body">
                <span id="route" style="display: none">{{$route}}</span>
                    <form id="my-form" action="{{route("admin-video.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal uploadAjax" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.course')}}</label>
                            <div class="col-sm-9">
                                <select name="course_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_title')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__('content.video_title')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_count')}}</label>
                            <div class="col-sm-9">
                                <input name="count" type="text" min="1" class="form-control" placeholder="№ Видео" maxlength="500" data-parsley-trigger="change" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_video')}}</label>
                            <div class="col-sm-9">
                                <input name="video_url" type="text" class="form-control" placeholder="Ссылка на Youtube" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />

{{--                        <div class="form-group">--}}
{{--                            <label class="col-sm-3 control-label">{{__('content.video_preview')}}</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="togglebutton">--}}
{{--                                    <label>--}}
{{--                                        <input type="checkbox" checked="">--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-sm-3 control-label">{{__('content.video_video')}}</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="customFile">--}}
{{--                                    <span class="selectedFile">{{__('content.selected')}}</span>--}}
{{--                                    <input type="file" id="file" name="video_url">--}}
{{--                                </div>--}}
{{--                                <div class="progress mt-5">--}}
{{--                                    <div class="bar"></div >--}}
{{--                                    <div class="percent">0%</div >--}}
{{--                                </div>--}}
{{--                                <div id="status"></div>--}}
{{--                                <div>--}}
{{--                                    <span><img id="ajax-gif" src="/images/upload-ajax.gif" style="display: none;width: 50px;height: 50px;"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">

                            <button type="submit" id="btn-submit" class="btn btn-raised btn-info">{{__('content.save')}}</button>
                            <a href="{{route("admin-video.index")}}" class="btn btn-raised btn-primary">{{__('content.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

