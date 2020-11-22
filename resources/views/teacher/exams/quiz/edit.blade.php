@extends('teacher.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>ИЗМЕНИТЬ</strong> ТЕСТ</h3>
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
                    <form id="my-form" action="{{route("quiz.update",$quiz->id)}}" method="post"  class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование теста</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="Наименование теста" maxlength="255" data-parsley-trigger="change" value="{{$quiz->title}}" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">Сохранить</button>
                            <a href="{{route("quiz.index")}}" class="btn btn-raised btn-primary">Назад</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

