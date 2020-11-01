@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__('content.my_video')}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>{{__('content.course')}}</th>
                                    <th>{{__('content.course_title')}}</th>
                                    <th>№ Видео</th>
                                    <th>Статус</th>
                                    <th>{{__('content.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                    <td>{{$video->course->title}}</td>
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

