@extends('teacher.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('admin.change')}}</strong></h3>
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
                    <form id="my-form" action="{{route("material.update",$material->id)}}" method="post"  enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.video')}}</label>
                            <div class="col-sm-9">
                                <select name="video_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($videos as $video)
                                        <option value="{{$video->id}}">{{$video->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.filename')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__('admin.filename')}}" maxlength="255" data-parsley-trigger="change" required value="{{$material->title}}">
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.links')}}</label>
                            <div class="col-sm-9">
                                <select name="links[]" multiple class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @if ($material->links)
                                        @foreach($material->links as $link)
                                            <option value="{{$link}}">{{$link}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.material_type')}}</label>
                            <div class="col-sm-9">
                                <select name="type" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="Документ">Документ</option>
                                    <option value="Изображение">{{__('admin.img')}}</option>
                                    <option value="Аудиозапись">{{__('admin.audio')}}</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Другое">{{__('admin.other')}}</option>
                                </select>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.file')}}</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>{{__('admin.file')}}</span>
												<input type="file" name="file" >
								</span>
                            </div>
                        </div>

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__('admin.change')}}</button>
                            <a href="{{route("material.index")}}" class="btn btn-raised btn-primary">{{__('admin.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection
