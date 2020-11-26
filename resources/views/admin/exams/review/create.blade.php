@extends('admin.layout')
@section('content')
    <!-- bradcome -->
    <a href="{{route("admin-review.index")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>

    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.new_review")}}</strong></h3>
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
                    <form id="my-form" action="{{route("admin-review.store")}}" method="post"  class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.course_author")}}</label>
                            <div class="col-sm-9">
                                <select class="course_author form-control" name="author_id"  data-parsley-trigger="change" required="" style="width: 100%!important;"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.review_title")}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__("admin.review_title")}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__('admin.save')}}</button>
                            <a href="{{route('admin-review.index')}}" class="btn btn-raised btn-primary">{{__('admin.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection


