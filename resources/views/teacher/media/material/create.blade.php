@extends('teacher.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('content.material_add')}}</strong></h3>
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
                    <form id="my-form" action="{{route("material.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Видео</label>
                            <div class="col-sm-9">
                                <select name="video_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($videos as $video)
                                        <option value="{{$video->id}}">{{$video->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.filename')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__('content.filename')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.additional_links')}}</label>
                            <div class="col-sm-9">
                                <select name="links[]" multiple class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;"></select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.material_type')}}</label>
                            <div class="col-sm-9">
                                <select name="type" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                        <option value="Документ">Документ</option>
                                        <option value="Изображение">{{__('content.img')}}</option>
                                        <option value="Аудиозапись">{{__('content.material_audio')}}</option>
                                        <option value="PDF">PDF</option>
                                        <option value="Другое">{{__('content.material_other')}}</option>
                                </select>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.material_video')}}</label>
                            <div class="col-sm-9">
                                <div class="customFile">
                                    <span class="selectedFile">{{__('content.selected')}}</span>
                                    <input type="file" id="file" name="file">
                                </div>
                            </div>
                        </div>

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__('content.save')}}</button>
                            <a href="{{route("material.index")}}" class="btn btn-raised btn-primary">{{__('content.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection
