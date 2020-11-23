@extends('admin.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__("admin.access_description")}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        @if ($userrequest->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th>{{__("admin.user.student")}}</th>
                                        <th>{{__("admin.video")}}</th>
                                        <th>{{__("admin.action")}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userrequest as $request)
                                        <tr>
                                            <td>{{$request->user->name}}</td>
                                            <td>{{$request->video->title}}</td>
                                            <td colspan="2">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a  href="{{route("admin-request-uservideo",$request->id)}}">
                                                                <i class="fa fa-eye"></i>
                                                                {{__("admin.watch")}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                           <h3>{{__("admin.no-request")}}</h3>
                        @endif

                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection


