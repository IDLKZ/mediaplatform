@extends('student.layout')
@section('content')


        <div class="page page-forms-wizard">
            <!-- bradcome -->
            <div class="b-b mb-10">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <h2 class="h3 m-0">Проходим тест: {{$video->examination->title}}</h2>
                        <h2 class="h3 m-0">Проходит тест: {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                        <h2 class="h3 m-0">Видео: {{$video->title}}</h2>

                    </div>
                </div>
            </div>
            <form action="{{route("student.checkExam")}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-12">
                    <section class="boxs">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-blue">
                                <strong>Тестирование по видео </strong></h3>
                        </div>
                        <div class="boxs-body">
                            <div id="b_rootwizard">
                                <div class="navbar" id="quizz">
                                    <div class="navbar-inner">
                                        <ul class="nav nav-pills">
                                            @foreach($data as $item)
                                            <li class="{{$loop->iteration == 1 ? "active":""}} mr-3">
                                                <a href="#btab{{$loop->iteration}}" data-toggle="tab">{{$loop->iteration}}</a>
                                            </li>
                                            @endforeach
                                                <li>
                                                    <a href="#comments" data-toggle="tab">Ваши комментарии</a>
                                                </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <input type="hidden" name="student_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                    <input type="hidden" name="author_id" value="{{$video->course->author_id}}">
                                    <input type="hidden" name="video_id" value="{{$video->id}}">
                                    <input type="hidden" name="course_id" value="{{$video->course_id}}">
                                    <input type="hidden" name="examination_id" value="{{$video->examination->id}}">
                                    @foreach($data as $item)
                                        <div class="{{$loop->iteration == 1 ? 'tab-pane active' : "tab-pane"}} border-info" id="btab{{$loop->iteration}}">
                                            <b>{!! $item["question"] !!}</b>
                                            <hr>
                                            <input hidden name="right[{{$item["id"]}}]" value="{{$item["answer"]}}">
                                            <input hidden name="question[{{$item["id"]}}]" value="{{$item["question"]}}">
                                            @foreach($item["questions"] as $question)
                                                        <input name="answer[{{$item["id"]}}]" id="{{$question}}" class="questionCheck" type="radio" value="{{$question}}"  required>
                                                        <label for="{{$question}}"><b>{{$question}}</b></label>
                                                        <br>
                                            @endforeach

                                        </div>
                                    @endforeach
                                    <div class="tab-pane" id="comments">
                                        <b>Ваш комментарий</b>
                                        <hr>
                                        <textarea name="student_comments" id="editor"></textarea>

                                    </div>


                                </div>
                                <button id="checkResult" type="submit" class="btn btn-raised btn-info">Отправить!</button>

                            </div>
                        </div>

                    </section>
                </div>

            </div>
            </form>
            <!-- page content -->

        </div>


    <!--/ CONTENT -->

@endsection
