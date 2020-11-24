@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <section class="boxs">
            <div class="boxs-header">
                <h3 class="custom-font hb-cyan">
                    <strong>{{__("admin.tasks")}}</strong></h3>
            </div>
            <!-- /boxs header -->

            <!-- boxs body -->
            <div class="boxs-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h4 class="custom-font hb-cyan">
                            <strong>{{__("admin.all_requests")}}</strong></h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge bg-red">{{$count["users"]}}</span> {{__("admin.subscribers")}}</li>
                            <li class="list-group-item">
                                <span class="badge bg-cyan">{{$count["results"]}}</span> {{__("admin.unchecked_result")}}</li>
                            <li class="list-group-item">
                                <span class="badge bg-greensea">{{$count["userrequest"]}}</span> {{__("admin.open_access")}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
