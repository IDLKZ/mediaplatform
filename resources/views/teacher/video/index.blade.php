@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">

                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-blue">
                            <strong>{{__('content.my_video')}} </strong></h3>

                    </div>
                    <div class="boxs-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach($courses as $course)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$course->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                {{$course->title}}
                                                <span class="badge bg-red">{{count($course->videos)}}</span>
                                            </a>

                                        </h4>

                                    </div>
                                    <div id="collapse{{$course->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-middle">
                                                    <thead>
                                                    <tr>
                                                        <th>{{__('content.course_title')}}</th>
                                                        <th>№ Видео</th>
                                                        <th>Статус</th>
                                                        <th>{{__('content.action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($course->videos as $video)
                                                        <tr>
                                                            <td>{{$video->title}}</td>
                                                            <td>{{$video->count}}</td>
                                                            <td>
                                                                <span class="label label-{{$video->available ? 'success' : 'warning'}} label-pill">{{$video->available ? 'Превью' : 'Не превью'}}</span>
                                                            </td>
                                                            <td colspan="2">
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                        <div class="ripple-container"></div></a>
                                                                    <ul class="dropdown-menu pull-right">

                                                                        <li>
                                                                            <a href="{{route("video.show",$video->alias)}}">
                                                                                {{__('content.watch')}}
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a  href="{{route("video.edit",$video->alias)}}">
                                                                                {{__('content.edit')}}
                                                                            </a>
                                                                        </li>

                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <form action="{{route('video.destroy',$video->alias)}}" method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                                                                                    {{__('content.delete')}}</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a href="{{route('video.create')}}"><button class="btn btn-raised btn-success">{{__('website.add_video')}}</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

