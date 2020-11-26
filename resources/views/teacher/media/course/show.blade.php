@extends('teacher.layout')
@section('content')
    <!--  CONTENT  -->
    <a href="{{route("course.index")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <div class="row clearfix">

    <div class="md-12">

        <div class="col-md-4 col-sm-12 col-xs-12" >
            <section class="boxs user_widget" style="height: 470px">
                <div class="uw_header l-blush">
                    <h5>{{strlen($course->title) >40 ? mb_substr($course->title,0,45). "..." : $course->title}}</h5>
                    <h5>{{\Illuminate\Support\Carbon::parse($course->created_at)->diffForHumans()}}</h5>
                </div>
                <div class="uw_image"> <img class="img-circle" src="{{$course->img}}" style="min-height: 120px" alt="{{$course->title}}"></div>
                <div class="uw_footer bg-white m-5">
                    <div class="text-center">
                        <p class="mt-20">{{$course->subtitle}}</p>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-xs-6 border-right">
                            <div class="uw_description">
                                <h5>{{__("admin.course_lang")}}:</h5>
                                <span>{{$course->language->title}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right">
                            <div class="uw_description">
                                <h5>{{__('admin.author')}}</h5>
                                <span>{{$course->author->name}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="uw_description">
                                <h5>{{__('admin.updated')}}:</h5>
                                <span>{{\Illuminate\Support\Carbon::parse($course->updated_at)->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div></div></div>
        <div class="col-md-8">
            <section class="boxs" style="height: 464px; overflow: scroll">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('admin.info')}}</strong> </h3>

                </div>
                <div class="boxs-body">
                    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#about" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">{{__('admin.course_about')}}</a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#advantage" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">{{__('admin.course_skills')}}</a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#requirement" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">{{__('admin.course_requirement')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active in" role="tabpanel" id="about" aria-labelledby="home-tab"
                            style="height: auto"
                            >
                                {!! $course->description !!}
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="advantage" aria-labelledby="profile-tab">
                                 @if (count($course->advantage))
                                    <h5 class="custom-font hb-blush">
                                        <strong>{{__('admin.course_what_will_you_learn')}}:</strong> </h5>
                                         <ul class="list-unstyled">
                                     @foreach($course->advantage as $advantage)
                                        <li>
                                            <i class="fa fa-check"></i>{{$advantage}}
                                        </li>
                                    @endforeach
                                     </ul>
                                 @endif
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="requirement" aria-labelledby="home-tab">
                                {{$course->requirement}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-green">
                        <strong>{{__('admin.videos')}}</strong></h3>
                </div>

                @if (!empty($course->videos->toArray()))
               <div class="row">
                   @foreach($course->videos as $video)
                       <div class="col-md-3 col-sm-6 col-xs-12 mh-350">
                           <div class="boxs project_widget">
                               <div class="pw_img">
                                   <img class="img-responsive" src="{{\Merujan99\LaravelVideoEmbed\Services\LaravelVideoEmbed::getYoutubeThumbnail($video->video_url)}}" style="width: 100%; height: auto" alt="About the image">
                               </div>
                               <div class="pw_content">

                                   <div class="pw_header">
                                       <h6>
                                           {{strlen($video->title) >20 ? mb_substr($video->title,0,20).".." : $video->title}}
                                       </h6>
                                       <small class="text-muted">{{strlen($video->course->title) > 20 ? mb_substr($video->course->title,0,12)."..." : $video->course->title }}  |  {{$video->created_at->diffForHumans()}}</small>
                                   </div>
                                   <div class="uw_footer pt-20">
                                       <div class="text-center">
                                           <ul class="controls list-group-flush p-0">
                                               <li class="dropdown list-group-item">
                                                   <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                       <i class="fa fa-cog"></i>
                                                   </a>
                                                   <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                                       <li>
                                                           <a href="{{route("video.show",$video->alias)}}" role="button" tabindex="0" >
                                                               <i class="fa fa-eye"></i> {{__('admin.watch')}} </a>
                                                       </li>
                                                       <li>
                                                           <a href="{{route("video.edit",$video->alias)}}" role="button" tabindex="0" >
                                                               <i class="fa fa-pencil"></i> {{__('admin.edit')}} </a>
                                                       </li>
                                                       <li>
                                                           <a href="{{route("video-subscriber",$video->alias)}}" role="button" tabindex="0" >
                                                               <i class="fa fa-group"></i> {{__('admin.subscribers')}} </a>
                                                       </li>
                                                       <li>
                                                           <a href="{{route("video-result-checked",$video->alias)}}" role="button" tabindex="0" >
                                                               <i class="fa fa-check-circle-o"></i> {{__('admin.checked_result')}} </a>
                                                       </li>
                                                       <li>
                                                           <a href="{{route("video-result-unchecked",$video->alias)}}" role="button" tabindex="0" >
                                                               <i class="fa fa-warning"></i>{{__('admin.unchecked_result')}} </a>
                                                       </li>

                                                       <li>
                                                           <a href="{{route("video-material",$video->alias)}}" role="button" tabindex="0" >
                                                               <i class="fa fa-bookmark-o"></i> {{__('admin.material')}} </a>
                                                       </li>
                                                       <li>
                                                           <form  method="post" action="{{route('video.destroy',$video->alias)}}">
                                                               @method("DELETE")
                                                               @csrf
                                                               <button onclick="return confirm({{__('admin.question')}})" role="button" tabindex="0" class="btn btn-a">
                                                                   <i class="fa fa-bitbucket"></i> {{__('admin.delete')}} </button>
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
               </div>
                @else
                    <div class="boxs-body">
                        {{__('content.notVideoCourse')}}
                    </div>
                @endif
            </section>
        </div>



    </div>


    </div>

    <!--/ CONTENT -->

@endsection
