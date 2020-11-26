@extends('admin.layout')
@section('content')
    <a href="{{route("admin-media-news")}}" class="btn btn-raised btn-info">{{__("content.back")}}</a>
    <div class="page static-page-tables">
        <div class="row clearfix">
            @if ($news->isNotEmpty())
                @foreach($news as $item)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="boxs project_widget">
                        <div class="pw_img">
                            <img class="img-responsive" style="width: 100%; height: auto" src="{{$item->thumbnail}}" alt="About the image">
                        </div>
                        <div class="pw_content">
                            <div class="pw_header">
                                <h6>{{$item->title}}</h6>
                                <small class="text-muted">{{$item->author->name}}  | {{$item->updated_at->diffForHumans()}} </small><br>
                                <small class="text-muted">{{$item->category->title}} </small>
                            </div>
                            <div class="pw_meta">
                                <div class="text-center">
                                    <ul class="controls list-group-flush p-0">
                                        <li class="dropdown list-group-item">
                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a href="{{route("admin-news.show",$item->alias)}}" role="button" tabindex="0" >
                                                        <i class="fa fa-eye"></i> {{__("admin.watch")}} </a>
                                                </li>
                                                <li>
                                                    <a href="{{route("admin-news.edit",$item->alias)}}" role="button" tabindex="0" >
                                                        <i class="fa fa-pencil"></i> {{__("admin.change")}} </a>
                                                </li>

                                                <li>
                                                    <form  method="post" action="{{route('admin-news.destroy',$item->alias)}}">
                                                        @method("DELETE")
                                                        @csrf
                                                        <button onclick="return confirm({{__("admin.question")}})" role="button" tabindex="0" class="btn btn-a">
                                                            <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$news->links()}}

            @else
                <h2>{{__("admin.not_found")}}</h2>
            @endif
        </div>
    </div>
    <a href="{{route("admin-news.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>
@endsection
