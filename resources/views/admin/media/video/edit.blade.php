@extends('admin.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('content.change')}}</strong></h3>
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
                    <form id="my-form" action="{{route("admin-video.update",$video->alias)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс</label>
                            <div class="col-sm-9">
                                <select name="course_id" class="form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.course_title')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__('content.course_title')}}" maxlength="255" data-parsley-trigger="change" required value="{{$video->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.course_description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $video->description !!}
                                </textarea>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_count')}}</label>
                            <div class="col-sm-9">
                                <input name="count" type="number" min="1" class="form-control" placeholder="№ Видео" maxlength="500" data-parsley-trigger="change" required value="{{$video->count}}">
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_preview')}}</label>
                            <div class="col-sm-9">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" checked="">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.video_course')}}</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>{{__('content.video')}}</span>
												<input type="file" name="video_url" >
								</span>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__('content.change')}}</button>
                            <a href="{{route("admin-video.index")}}" class="btn btn-raised btn-primary">{{__('content.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

