@extends('admin.layout')
@section('content')
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>Изменить новость</strong></h3>
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
                    <form id="my-form" action="{{route("admin-news.update",$news->alias)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Категория</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option selected value="{{$news->category_id}}">{{$news->category->title}}</option>

                                        @foreach($categories as $category)
                                        @if ($news->category_id != $category->id)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endif
                                        @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Язык контента</label>
                            <div class="col-sm-9">
                                <select name="language_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option selected value="{{$news->language_id}}">{{$news->language->title}}</option>
                                    @foreach($languages as $language)
                                        @if ($news->language_id != $language->id)
                                            <option value="{{$language->id}}">{{$language->title}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование Новости</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="Наименование новости" maxlength="255" data-parsley-trigger="change" required value="{{$news->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Контент новости</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $news->description !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Доп ссылки</label>
                            <div class="col-sm-9">
                                <select name="links[]" multiple class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($news->links as $link)
                                        <option value="{{$link}}">{{$link}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Предпросмотр изображения</label>
                            <div class="col-sm-9">
                                <div class="customFile">
                                    <span class="selectedFile">Предпросмотр изображения</span>
                                    <input type="file" id="file" name="thumbnail">
                                </div>
                                <img src="{{$news->thumbnail}}" width="150px" height="150px">
                            </div>

                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Изображение новости</label>
                            <div class="col-sm-9">
                                <div class="customFile">
                                    <span class="selectedFile">Изображение новости</span>
                                    <input type="file" id="file" name="img">
                                </div>
                                <img src="{{$news->img}}" width="150px" height="150px">
                            </div>

                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__('content.save')}}</button>
                            <a href="{{route("admin-news.index")}}" class="btn btn-raised btn-primary">{{__('content.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection


