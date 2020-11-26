@extends('admin.layout')
@section('content')
    <a href="{{route("admin-video.index")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('admin.new_video')}}</strong></h3>
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
                <span id="route" style="display: none">{{$route}}</span>
                    <form id="my-form" action="{{route("admin-video.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.course')}}</label>
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
                            <label class="col-sm-3 control-label">{{__('admin.video_title')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__('content.video_title')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.video_descriptions')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />


                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.video_url')}}</label>
                            <div class="col-sm-9">
                                <input name="video_url" type="text" class="form-control" placeholder="Ссылка на Youtube" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />



                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">

                            <button type="submit" id="btn-submit" class="btn btn-raised btn-info">{{__('admin.save')}}</button>
                            <a href="{{route("admin-video.index")}}" class="btn btn-raised btn-primary">{{__('admin.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

