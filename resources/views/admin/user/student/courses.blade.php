@extends('admin.layout')
@section('content')
    <a href="{{route("user.show",$id)}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    @if(!$subscribers->isEmpty())
                    @foreach($subscribers as $subscriber)
                        <div class="col-md-12 col-sm-12  course-item mt-20">
                            <div class="row">
                                <div class="col-md-3 course-item-header ">
                                    <div class="course-item-image p-sm-10">
                                        <img src="{{$img = $subscriber->course->img !=null ? $subscriber->course->img :"/images/no-image.png" }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-9 course-title">
                                    <div class="col-md-10">
                                        <h3 class="text-blush">{{$subscriber->course->title}}</h3>
                                        <small class="text-blush">{{__("admin.author")}}:{{$subscriber->course->author->name}}</small><br>
                                        <small class="text-blush">{{__("admin.created")}}: {{$subscriber->course->created_at->diffForHumans()}}</small> |
                                        <small class="text-blush">{{__("admin.updated")}} {{$subscriber->course->updated_at->diffForHumans()}}</small>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <ul class="controls list-group-flush">
                                            <li class="dropdown list-group-item">
                                                <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-cog"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp list-unstyled">

                                                    <li>
                                                        <a href="{{route("admin-course.show",$subscriber->course->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-eye"></i> {{__("admin.watch")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("admin-course-videos",$subscriber->course->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-vimeo-square"></i> {{__("admin.videos")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("admin-course.edit",$subscriber->course->alias)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-pencil"></i> {{__("admin.change")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("admin-course-subscribers",$subscriber->course->id)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-user-plus"></i> {{__("admin.subscribers")}} </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route("admin-course-unconfirmed",$subscriber->course->id)}}" role="button" tabindex="0" >
                                                            <i class="fa fa-question-circle"></i> {{__("admin.request")}} </a>
                                                    </li>
                                                    <li>
                                                        <form  method="post" action="{{route('admin-course.destroy',$subscriber->course->alias)}}">
                                                            @method("DELETE")
                                                            @csrf
                                                            <button onclick="return confirm('Вы уверены, удаление курса приведет к удалению видео!')" role="button" tabindex="0" class="btn btn-a">
                                                                <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>{{$subscriber->course->subtitle}}</h5>
                                        <hr>
                                        <div class="uw_footer ">
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-4 border-right">
                                                    <div class="uw_description text-center">
                                                        <i class="fa fa-flag"></i>
                                                        <h5>{{$subscriber->course->language->title}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-xs-4 border-right">
                                                    <div class="uw_description text-center">
                                                        <i class="fa fa-group"></i>
                                                        <h5>{{$subscriber->course->subscribers->count()}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-xs-4">
                                                    <div class="uw_description text-center">
                                                        <i class="fa fa-vimeo-square"></i>
                                                        <h5>{{$subscriber->course->videos->count()}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>






                            </div>
                        </div>
                    @endforeach
                    {{$courses->links()}}

    @endif
@endsection

    <!--/ CONTENT -->

