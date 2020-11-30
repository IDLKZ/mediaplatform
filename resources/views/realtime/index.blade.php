@extends('Frontend.layout')
@section('content')
    <section class="section lb desk-none-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="widget clearfix">
                        <div class="custom-module">
                            <h4 class="module-title"><i class="material-icons">list</i>{{__('admin.all_categories')}}
                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                    <a href="" data-toggle="modal" data-target="#exampleModal"><span class="badge badge-secondary">{{__('content.create')}}</span></a>
                                @endif
                            </h4>

                            <!-- Modal -->
                            <form action="/add-forum-category" method="post">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{__('admin.new_category')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="name" class="form-control" placeholder="{{__('admin.category_title')}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-raised btn-secondary" data-dismiss="modal">{{__('content.close')}}</button>
                                                <button type="submit" class="btn btn-raised btn-primary">{{__('content.save')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('singleCategory', $category->id)}}">{{$category->name}}</a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 )
                                            <a href="{{route('deleteForumCategory', $category->id)}}"><span class="badge badge-danger">&times;</span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul><!-- end cats -->
                            <hr>
                            <h3>{{__('content.ask')}}</h3>
                            <form action="/add-discussion" method="post">
                                @csrf
                                <label for="category_id">{{__('content.select_category')}}</label>
                                <select name="category" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label for="title">{{__('content.title_category')}}</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="{{__('content.name_category')}}">

                                <label for="description">{{__('content.description_category')}}</label>
                                <textarea name="description" id="description" class="form-control"></textarea>

                                <button type="submit" class="btn btn-raised btn-success">{{__('content.send')}}</button>
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

                                    <h4>
                                        <a href="{{route('singlePost', $discussion->slug)}}">{{$discussion->title}}
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 )
                                                <a href="{{route('deleteForumPost', $discussion->id)}}"><span class="badge badge-danger">&times;</span></a>
                                            @endif
                                        </a>
                                    </h4>
                                    <div class="blog-meta clearfix">
                                        <small>{{$discussion->created_at->diffForHumans()}}</small>
                                        <small>in: <a href="{{route('singleCategory', $discussion->category->slug)}}"> {{$discussion->category->name}}</a></small>
                                    </div>

                                    <p>{!! $discussion->post->body !!}</p>
                                    <a href="{{route('singlePost', $discussion->slug)}}" class="readmore" title="">{{__('front.more_details')}}</a>
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
