@extends('Frontend.layout')
@section('content')
    <section class="section lb desk-none-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="widget clearfix">
                        <div class="custom-module">
                            <h4 class="module-title"><i class="material-icons">list</i>Категории</h4>

                            <ul class="categories">
                                @foreach($categories as $category)
                                <li><a href="{{route('singleCategory', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul><!-- end cats -->
                            <hr>
                            <h3>Задать вопрос</h3>
                            <form action="/add-discussion" method="post">
                                @csrf
                                <label for="category_id">Выберите категорию</label>
                                <select name="category" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label for="title">Заголовок темы</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="наименование">

                                <label for="description">Описание</label>
                                <textarea name="description" id="description" class="form-control"></textarea>

                                <button type="submit" class="btn btn-raised btn-success">Отправить</button>
                            </form>
                        </div><!-- end custom-module -->
                    </div><!-- end widget -->

                </div>

                <div class="col-md-8">
                    <aside class="topic-page topic-list blog-list forum-list">
                        @foreach($discussions as $discussion)
                        <article class="well btn-group-sm clearfix">
                            <div class="topic-desc row-fluid clearfix">
                                <div class="col-sm-2 text-center publisher-wrap">
                                    <img src="{{$discussion->user->img}}" alt="" class="avatar img-circle img-responsive">
                                    <h5>{{$discussion->user->name}}</h5>
                                </div>
                                <div class="col-sm-10">

                                    <h4> <a href="single-forum.html">{{$discussion->title}}</a></h4>
                                    <div class="blog-meta clearfix">
                                        <small>{{$discussion->created_at->diffForHumans()}}</small>
                                        <small>in: <a href="{{route('singleCategory', $discussion->category->slug)}}"> {{$discussion->category->name}}</a></small>
                                    </div>

                                    <p>{!! $discussion->post->body !!}</p>
                                    <a href="{{route('singlePost', $discussion->slug)}}" class="readmore" title="">Подробнее</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <article class="well clearfix">
                            {!! $discussions->links() !!}
                        </article>
                    </aside>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@stop
