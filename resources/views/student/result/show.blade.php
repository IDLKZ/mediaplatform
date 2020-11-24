@extends('student.layout')

@section('content')
    <div class="container">
        {{Diglactic\Breadcrumbs\Breadcrumbs::render('show', $result)}}
        <div class="row">
            <div class="col-4">
                @include('student.left_sidebar')
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-md-12">
                        <section class="boxs">
                            <div class="boxs-header">
                                <h3 class="custom-font hb-blush">
                                    <strong>{{__('student.results')}}</strong></h3>
                            </div>
                            <div class="boxs-body">

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.name_exam')}}</label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{$result->examination->title}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.author_exam')}}</label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{$result->author->name}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Курс </label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{$result->course->title}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Видео</label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{$result->video->title}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.comment_user')}}</label>
                                    <div class="col-sm-9">
                                        {!! $result->student_comments !!}
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.time_exam')}}</label>
                                    <div class="col-sm-9">
                                        {{$result->passed_day}}
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.time_check')}}</label>
                                    <div class="col-sm-9">
                                        {{$result->checked_day}}
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.comment_author')}}</label>
                                    <div class="col-sm-9">
                                        {!! $result->teacher_comments !!}
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">{{__('student.appraisal')}}</label>
                                    <div class="col-sm-9">
                                        {{$result->result}}
                                    </div>
                                </div>
                                <hr class="line-dashed full-witdh-line" />

                                <section class="boxs">
                                    <div class="boxs-body p-0">
                                        <table class="table table-condensed table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>{{__('student.question')}}</th>
                                                <th>{{__('student.answer')}}</th>
                                                <th>{{__('student.answer_r')}}</th>
                                                <th>Балл</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($result->answers as $answer)
                                                <tr>
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>
                                                        {!! $answer["question"] !!}
                                                    </td>
                                                    <td>
                                                        {!! $answer["answer"]  !!}
                                                    </td>
                                                    @if (isset($answer["right"]))
                                                        <td>
                                                            <p>{{$answer["right"]}}</p>
                                                        </td>
                                                        <td>
                                                            <p>{{$answer["answer"] == $answer["right"] ? 1 : 0}}</p>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            <td colspan="4">
                                                {{__('student.outcome')}}:
                                            </td>
                                            <td>
                                                {{$result->result}}
                                            </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>






                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
