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
            @foreach($reviews as $review)
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs user_widget">
                        <div class="uw_header l-dark-salad-blush">
                            <h5>{{$review->title}}</h5>
                            <i class="fa fa-question-circle users-icon"></i>
                        </div>
                        <div class="uw_footer pt-20">
                            <div class="text-center">
                                <p class="mt-20">
                                    Автор : {{$review->author->name}}
                                </p>
                                <ul class="controls list-group-flush p-0">
                                    <li class="dropdown list-group-item">
                                        <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                            <li>
                                                <a href="{{route('admin-review.show',$review->id)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-eye"></i> Посмотреть </a>
                                            </li>
                                            <li>
                                                <a  href="{{route("admin-review-question.create")}}">
                                                    <i class="fa fa-plus-circle"></i>
                                                    Добавить вопрос
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin-review.edit',$review->id)}}" role="button" tabindex="0" >
                                                    <i class="fa fa-pencil"></i> Изменить </a>
                                            </li>
                                            <li>
                                                <form  method="post" action="{{route('admin-review.destroy',$review->id)}}">
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
    <a href="{{route("admin-review.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>




@endsection



