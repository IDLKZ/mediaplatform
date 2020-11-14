@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Экзамены</h1>
                    <small class="text-muted">Здесь вы можете добавить экзамены, тесты и опросы</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @foreach($examinations as $examination)
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-blush">
                        <h3>{{$examination->title}}</h3>
                        <h5>Курс:{{$examination->course->title}}</h5>
                    </div>
                    <div class="uw_image"> <img class="img-circle" src="{{$examination->course->img}}" alt="User Avatar"></div>
                    <div class="uw_footer ">
                        <div class="text-center">
                                    <p>Автор: {{$examination->author->name}}</p><br>
                                   <p>Видео: {{$examination->video->title}}</p>
                            @if ($examination->quiz_id)
                                <p class="mt-20">Тест: {{$examination->quiz->title}}</p>
                            @endif
                            @if ($examination->review_id)
                                <p class="mt-20">Тест: {{$examination->review->title}}</p>
                            @endif
                        </div>
                        <div class="boxs-header">
                            <h3 class="custom-font hb-cyan">Информация</h3>
                                {!! $examination->description !!}

                        </div>
                        <div class="text-center">
                            <ul class="controls list-group-flush p-0">
                                <li class="dropdown list-group-item">
                                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                        <li>
                                            <a href="" role="button" tabindex="0" >
                                                <i class="fa fa-pencil"></i> Изменить </a>
                                        </li>
                                        <li>
                                            <form  method="post" action="{{route('admin-examination.destroy',$examination->id)}}">
                                                @method("DELETE")
                                                @csrf
                                                <button onclick="return confirm('Вы уверены?')" role="button" tabindex="0" class="btn btn-a">
                                                    <i class="fa fa-bitbucket"></i> Удалить </button>
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </section>
            </div>
            @endforeach
        </div>


    </div>
    <a href="{{route("admin-examination.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>




@endsection




