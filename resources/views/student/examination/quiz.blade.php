@extends('student.layout')
@section('content')

    <form action="{{route("student.checkExam")}}" method="post" style="width: 100%">
        @csrf
    <div class="step-app" id="demo" style="width: 80%">
        <ul class="step-steps">
            @foreach($data as $item)
            <li data-step-target="step1">{{$loop->index}}</li>
            @endforeach
        </ul>

        <div class="step-content">
            <input type="hidden" name="student_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
            <input type="hidden" name="author_id" value="{{$video->course->author_id}}">
            <input type="hidden" name="video_id" value="{{$video->id}}">
            <input type="hidden" name="course_id" value="{{$video->course_id}}">
            <input type="hidden" name="examination_id" value="{{$video->examination->id}}">
            @foreach($data as $item)
            <div class="step-tab-panel" data-step="step{{$loop->iteration}}">
                <b>{!! $item["question"] !!}</b>
                <hr>
                <input hidden name="right[{{$item["id"]}}]" value="{{$item["answer"]}}">
                <input hidden name="question[{{$item["id"]}}]" value="{{$item["question"]}}">
                @foreach($item["questions"] as $k => $question)
                    <input name="answer[{{$item["id"]}}]" id="" class="questionCheck" type="radio" value="{{$question}}"  required>
                    <label for=""><b>{{$question}}</b></label>
                    <br>
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="step-footer">
            <button data-step-action="prev" class="step-btn">{{__('student.prev')}}</button>
            <button data-step-action="next" class="step-btn">{{__('student.next')}}</button>
            <button id="checkResult" type="submit" class="step-btn">{{__('student.pass_end')}}</button>
        </div>

    </div>

    </form>
    <!--/ CONTENT -->

@endsection
