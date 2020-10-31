@extends('student.layout')
@section('content')

    <div class="page profile-page">
        <div class="col-md-12">
            <section class="boxs">
                <div class="profile-header">
                    <div class="profile_info">
                        <div class="profile-image">
                            <img src="{{\Illuminate\Support\Facades\Auth::user()->img}}" height="120" width="120">
                        </div>
                        <h4 class="mb-0"><strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong></h4>
                        <span class="text-muted">Студент</span>
                        <div class="mt-10">
                            <button class="btn btn-raised bg-blush btn-sm">Follow</button>
                            <button class="btn btn-raised bg-green btn-sm">Message</button>
                        </div>
                        <p class="m-0">
                            <a title="Twitter" href="#" class="icon-color p-5">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a title="Facebook" href="#" class="icon-color p-5">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a title="Google-plus" href="#" class="icon-color p-5">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a title="Behance" href="#" class="icon-color p-5">
                                <i class="fa fa-behance"></i>
                            </a>
                            <a title="Instagram" href="#" class="icon-color p-5">
                                <i class="fa fa-instagram "></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="profile-sub-header">
                    <div class="box-list">
                        <ul class="text-center">
                            <li>
                                <a href="mail-inbox.html" class="">
                                    <i class="fa fa-inbox"></i>
                                    <p>Почта</p>
                                </a>
                            </li>
                            <li>
                                <a href="gallery.html" class="">
                                    <i class="fa fa-photo"></i>
                                    <p>Мои курсы</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-paperclip"></i>
                                    <p>Мои файлы</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-tasks "></i>
                                    <p>Задание</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-12">
            <section class="boxs progress-report">
                <div class="boxs-header">
                    <h3 class="custom-font hb-green">
                        <strong>Прогресс </strong>в учебе</h3>
                    <ul class="controls">
                        <li class="dropdown">
                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                                <i class="fa fa-spinner fa-spin"></i>
                            </a>
                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                <li>
                                    <a role="button" tabindex="0" class="boxs-fullscreen">
                                        <i class="fa fa-expand"></i> Полный экран </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="boxs-body table-custom">
                    <div class="table-responsive">
                        <table class="table table-custom" id="project-progress">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Курс</th>
                                <th>Прогресс</th>
                                <th class="text-right no-sort">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <small class="text-danger">{{$course->course->title}}</small>
                                </td>
                                <td>
                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px; height: 15px;border-radius: 15px">
                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="{{$course->course->videos->count() != 0 ? (count($course->course->results)/$course->course->videos->count())*100 : 0}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$course->course->videos->count() != 0 ? (count($course->course->results)/$course->course->videos->count())*100 : 0}}%;"></div>
                                    </div>
                                    <small>{{$course->course->videos->count() != 0 ? intval((count($course->course->results)/$course->course->videos->count())*100) : 0}}%</small>
                                </td>
                                <td class="text-right">
                                    <a href="{{route('student.course.show', $course->course->alias)}}"><button class="btn btn-info btn-raised">Продолжить</button></a>
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

@endsection
