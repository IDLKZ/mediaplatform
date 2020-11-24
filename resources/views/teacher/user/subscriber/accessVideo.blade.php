@extends('teacher.layout')

@section("content")
    <!--CONTENT  -->

    <div class="page profile-page">
        <a href="{{route("teacher-users")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
        <section class="boxs">
            <div class="boxs-header">
                <h3 class="custom-font hb-green">
                    <strong>{{__("admin.student.accessVideo")}}</strong></h3>

            </div>
            <div class="boxs-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        @if ($subscribers->isNotEmpty())
                            @foreach ($subscribers as $subscriber)
                                <div class="panel-heading m-10 bg-green" role="tab" id="headingOne">
                                    <ul class="inbox-widget list-unstyled clearfix ">
                                        <li class="inbox-inner"> <a data-toggle="collapse" data-parent="#accordion" href="#{{$subscriber->course->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                <div class="inbox-item">
                                                    <div class="inbox-img"> <img src="{{$subscriber->course->img}}" alt=""> </div>
                                                    <div class="inbox-item-info">
                                                        <p class="text-white">{{$subscriber->course->title}}</p>
                                                    </div>
                                                </div>
                                            </a> </li>
                                    </ul>
                                </div>
                                <div id="{{$subscriber->course->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>{{__("admin.status")}}</th>
                                                <th colspan="3">{{__("admin.video")}}</th>
                                                <th>{{__("admin.action")}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subscriber->videos as $video)
                                                @if($video->course_id == $subscriber->course->id)
                                                    @if(in_array($video->id,$subscriber->uservideo->pluck("video_id")->toArray()))

                                                        <tr class="bg-success">
                                                            <td><span class="list-icon linkedin"><i class="fa fa-unlock"></i></span>
                                                            </td>
                                                            <td colspan="3"><span class="list-name">{{$video->title}}</span>
                                                                <span class="text-muted"></span>
                                                            </td>
                                                            <td> <div class="dropdown">
                                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                        <div class="ripple-container"></div></a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li>
                                                                            <form method="post" action="{{route("giveAccessToVideo")}}">
                                                                                @csrf
                                                                                <input type="text" name="subscribe_id" value="{{$subscriber->id}}"   class="hidden">
                                                                                <input type="text" name="student_id" value="{{$subscriber->user_id}}"   class="hidden">
                                                                                <input type="text" name="video_id" value="{{$video->id}}"    class="hidden">
                                                                                <button style="border: none; background: transparent; color: black" type="submit" >
                                                                                    <i class="fa fa-unlock"></i>
                                                                                    {{__("admin.close_access")}}
                                                                                </button>
                                                                            </form>

                                                                        </li>
                                                                    </ul>
                                                                </div></td></td>

                                                        </tr>

                                                    @else
                                                        <tr>
                                                            <td><span class="list-icon linkedin"><i class="fa fa-lock"></i></span>
                                                            </td>
                                                            <td colspan="3"><span class="list-name">{{$video->title}}</span>
                                                                <span class="text-muted"></span>
                                                            </td>
                                                            <td> <div class="dropdown">
                                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                        <div class="ripple-container"></div></a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li>
                                                                            <form method="post" action="{{route("giveAccessToVideo")}}">
                                                                                @csrf
                                                                                <input type="text" name="subscribe_id" value="{{$subscriber->id}}"   class="hidden">
                                                                                <input type="text" name="student_id" value="{{$subscriber->user_id}}"   class="hidden">
                                                                                <input type="text" name="video_id" value="{{$video->id}}"    class="hidden">
                                                                                <button style="border: none; background: transparent" type="submit" >
                                                                                    <i class="fa fa-unlock"></i>
                                                                                    {{__("admin.open_access")}}
                                                                                </button>
                                                                            </form>

                                                                        </li>
                                                                    </ul>
                                                                </div></td></td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            @endforeach
                            {{$subscribers->links()}}
                        @else
                            {{__("admin.no_courses")}}
                        @endif


                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
