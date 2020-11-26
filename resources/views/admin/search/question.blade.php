@extends('admin.layout')
@section('content')
    <a href="{{route("admin-search")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.search_question")}}</strong></h3>
                </div>
                <div class="boxs-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="my-form" action="{{route("admin-search-question-result")}}" method="get" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.search_in")}}</label>
                            <div class="col-sm-9">
                                <select name="type" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="quiz">{{__("admin.quiz")}}</option>
                                    <option value="review">{{__("admin.review")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="boxs-body">
                            <div class="input-group search-bar">
                                <div class="form-group is-empty">
                                    <input type="text" class="form-control " name="query" placeholder="{{__("admin.search_key")}}..."><span class="material-input"></span></div>
                                <span class="input-group-btn">
										<button type="submit" class="btn btn-raised btn-default" type="button">
											<i class="fa fa-search"></i> {{__("admin.search")}}!</button>
									</span>
                            </div>
                        </div>

                    </form>
                </div>

            </section>
        </div>
    </div>
    @if (isset($searchResults) && isset($searchterm))
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font text-success">
                            <strong>{{__("admin.search_word")}} "{{$searchterm}}"</strong></h3>
                    </div>
                    <div class="boxs-body">
                        @if ($searchResults->isNotEmpty())
                            @if ($searchtype == "quiz")
                                <h4>{{__("admin.search_quiz")}}</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{__("admin.title")}}</th>
                                            <th>{{__("admin.question")}}</th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                            <th>E</th>
                                            <td>{{__("admin.right_answer")}}</td>
                                            <td>{{__("admin.action")}}</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td>
                                                    <a>{{$result->quiz->title}}</a>
                                                </td>
                                                <td>
                                                    <a>{{$result->question}}</a>
                                                </td>
                                                <td>
                                                    <p>{{$result->A}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->B}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->C}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->D}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->E}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$result->answer}}</p>
                                                </td>
                                                <td>
                                                    <ul class="controls" style="list-style: none">
                                                        <li class="dropdown">
                                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="true">
                                                                <i class="fa fa-cog"></i>
                                                            </a>
                                                            <ul class="dropdown-menu " >
                                                                <li>
                                                                    <a href="{{route("admin-question.edit",$result->id)}}">
                                                                        <i class="fa fa-pencil"></i> {{__("admin.change")}}
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$searchResults->links()}}
                                </div>
                            @endif
                            @if ($searchtype == "review")
                                <h4>Поиск по Опросам</h4>
                                <div class="body table-responsive members_profiles">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{__("admin.title")}}</th>
                                            <th>{{__("admin.review_questions")}}</th>
                                            <th>{{__("admin.action")}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td>
                                                    <a>{{$result->review->title}}</a>
                                                </td>
                                                <td>
                                                    <p>{{$result->question}}</p>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$searchResults->links()}}
                                </div>
                            @endif

                        @else
                            <h3 class="text-danger"> {{__("admin.not_found")}}</h3>
                        @endif
                    </div>

                </section>
            </div>
        </div>
    @endif


@endsection




