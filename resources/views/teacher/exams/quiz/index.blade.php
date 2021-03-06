@extends('teacher.layout')
@section('content')
    <a href="{{route("teacher-exams")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.quiz")}}</h1>
                    <small class="text-muted">{{__("admin.exam_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @if ($quizzes->isNotEmpty())
                @foreach($quizzes as $quiz)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section class="boxs user_widget">
                            <div class="uw_header l-light-blue-blush">
                                <h5>{{$quiz->title}}</h5>
                                <i class="fa fa-list-ol users-icon"></i>
                            </div>
                            <div class="uw_footer pt-20">
                                <div class="text-center">
                                    <p class="mt-20">
                                        {{__("admin.author")}}:{{$quiz->author->name}}
                                    </p>
                                    <ul class="controls list-group-flush p-0">
                                        <li class="dropdown list-group-item">
                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a href="{{route('quiz.show',$quiz->id)}}" role="button" tabindex="0" >
                                                        <i class="fa fa-eye"></i> {{__("admin.watch")}} </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('quiz.edit',$quiz->id)}}" role="button" tabindex="0" >
                                                        <i class="fa fa-pencil"></i> {{__("admin.edit")}} </a>
                                                </li>
                                                <li>
                                                    <form  method="post" action="{{route('quiz.destroy',$quiz->id)}}">
                                                        @method("DELETE")
                                                        @csrf
                                                        <button onclick="return confirm({{__("admin.question")}})" role="button" tabindex="0" class="btn btn-a">
                                                            <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </section>
                    </div>
                @endforeach
                {{$quizzes->links()}}
            @else
                <h3>{{__("admin.not_found")}}</h3>

            @endif

        </div>


    </div>
    <a href="{{route("quiz.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>




@endsection



