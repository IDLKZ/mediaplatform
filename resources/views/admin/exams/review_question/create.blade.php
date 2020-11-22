@extends('admin.layout')
@section('content')
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>НОВЫЙ</strong> ВОПРОС К ОПРОСУ</h3>
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
                    <form id="my-form" action="{{route("admin-review-question.store")}}" method="post" enctype="multipart/form-data"  class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Опрос</label>
                            <div class="col-sm-9">
                                <select name="review_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($reviews as $review)
                                        <option value="{{$review->id}}">{{$review->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Вопрос</label>
                            <div class="col-sm-9">
                                <textarea name="question" id="editor"></textarea>
                            </div>
                        </div>



                        <hr class="line-dashed full-witdh-line" />


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__('content.save')}}</button>
                            <a href="{{route('admin-review-question.index')}}" class="btn btn-raised btn-primary">{{__('content.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection


