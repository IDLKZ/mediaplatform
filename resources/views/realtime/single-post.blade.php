@extends('Frontend.layout')
@section('content')
    <section class="section lb desk-none-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {{Diglactic\Breadcrumbs\Breadcrumbs::render('post', $discussion)}}
                    <hr>
                    <aside class="topic-page topic-list blog-list forum-list single-forum">
                        <article class="well btn-group-sm clearfix">

                            <div class="topic-desc row-fluid clearfix">
                                <div class="col-sm-2 text-center publisher-wrap">
                                    <img src="{{$discussion->user->img}}" alt="" class="avatar img-circle img-responsive">
                                    <h5>{{$discussion->user->name}}</h5>
                                </div>
                                <div class="col-sm-10">

                                    <h4>{{$discussion->title}}</h4>
                                    <div class="blog-meta clearfix">
                                        <small>{{$discussion->created_at->diffForHumans()}}</small>
                                        <small>Категория: <a href="{{route('singleCategory', $discussion->category->id)}}"> {{$discussion->category->name}}</a></small>
                                    </div>
                                    {!! $discussion->post->body !!}

                                </div>
                            </div><!-- end tpic-desc -->
                            @foreach($comments as $comment)
                            <div class="topic-desc row-fluid clearfix">
                                <div class="col-sm-2 text-center publisher-wrap">
                                    <img src="{{$comment->user->img}}" alt="" class="avatar img-circle img-responsive">
                                    <h5>{{$comment->user->name}}</h5>
                                    @if ($comment->user->role_id == 1)
                                        <small class="offline">Админ</small>
                                    @endif
                                </div>
                                <div class="col-sm-10">

                                    <div class="blog-meta clearfix">
                                        <small>{{$comment->created_at->diffForHumans()}}</small>
                                    </div>
                                    {!! $comment->comment !!}
                                </div>
                            </div><!-- end tpic-desc -->
                            @endforeach

                            <div id="reply" class="forum-answer topic-desc clearfix">
                                <div class="row">
                                    <div class="col-sm-2 text-center publisher-wrap">
                                        <img src="{{\Illuminate\Support\Facades\Auth::user()->img}}" alt="" class="avatar img-circle img-responsive">
                                        <h5>{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group is-empty">
                                            <label for="textArea" class="col-md-2 control-label">Ответить</label>
                                            <div class="col-md-10">
                                                <form action="/send-comment" method="post">
                                                    @csrf
                                                    <input type="hidden" name="post" value="{{$discussion->post->id}}">
                                                    <textarea name="description" class="form-control" rows="3" id="textArea"></textarea>
                                                    <button type="submit" class="btn btn-raised btn-info gr">Ответить</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end answer -->

                        </article>

                        <ul class="pager">
                            {!! $comments->links() !!}
                        </ul>
                    </aside>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
