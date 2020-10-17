@extends('student.layout')
@section('content')

    <div class="page profile-page">
        <div class="col-md-12">
            <section class="boxs">
                <div class="profile-header">
                    <div class="profile_info">
                        <div class="profile-image">
                            <img src="/images/profile-photo.jpg" alt="">
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
                        <strong>Project </strong>Progress</h3>
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
                                <th>ID</th>
                                <th>Project</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th class="text-right no-sort">Chart</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Graphic layout for client</td>
                                <td>
                                    <small class="text-danger">High Priority</small>
                                </td>
                                <td>
                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%;"></div>
                                    </div>
                                    <small>42%</small>
                                </td>
                                <td class="text-right">

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Make website responsive</td>
                                <td>
                                    <small class="text-success">Low Priority</small>
                                </td>
                                <td>
                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                    </div>
                                    <small>89%</small>
                                </td>
                                <td class="text-right">

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
