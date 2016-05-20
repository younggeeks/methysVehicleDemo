@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">List Of Registered Vehicles <a href="{{URL::to("vehicle/create")}}" class="pull-right "><i class="fa fa-plus"></i>Register Vehicle</a></div>


            <div id="content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#registered" data-toggle="tab">Registered Vehicles <span class="badge badge-info">{{count($vehicles)}}</span></a></li>
                    <li><a href="#deleted" data-toggle="tab">Deleted Vehicles <span class="badge badge-info">{{count($deleted)}}</span></a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="registered">
                        <h1>Registered Vehicles </h1>
                        @if(count($vehicles))
                            <table class="table table-bordered">
                                <tr>
                                    <th>Owner Name</th>
                                    <th>Vehicle manufacturer</th>
                                    <th>manufacturing Year </th>
                                    <th>Date registered</th>
                                    <th>ACTION</th>
                                </tr>

                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td><a  href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->owner->first_name.' '.$vehicle->owner->last_name}}</a></td>
                                        <td><a href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->manufacturer}}</a></td>
                                        <td><a href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->year }}</a></td>
                                        <td><a href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->created_at->format("d-m-Y")}} ({{$vehicle->created_at->diffForHumans()}})</a></td>
                                        <td><a href="{{URL::to("vehicle/edit",$vehicle->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a></td>
                                        <td>
                                            {{--<form action="{{url("vehicle/delete",$vehicle->id)}}" method="post">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--{{ method_field('DELETE') }}--}}
                                            {{--<button type="submit"><i class="fa fa-trash"></i>Delete</button>--}}


                                            {{--</form>--}}

                                            {!! Form::open(array('url' => ['vehicle/delete',$vehicle->id],"method"=>"delete","class"=>"delete-form")) !!}
                                            <button class="btn btn-danger" id="deleteBtn"  type="submit">Delete</button>
                                            {!! Form::close() !!}



                                        </td>
                                    </tr>
                                @endforeach


                            </table>
                        @else
                            <div class="alert alert-info">No Vehicle Has Been Registered In The System Yet</div>
                        @endif
                    </div>
                    <div class="tab-pane" id="deleted">
                        <h1>Deleted Vehicles</h1>
                        @if(count($deleted))
                            <table class="table table-bordered">
                                <tr>
                                    <th>Owner Name</th>
                                    <th>Vehicle manufacturer</th>
                                    <th>manufacturing Year </th>
                                    <th>Deletion Date</th>
                                    <th>ACTION</th>
                                </tr>

                                @foreach($deleted as $vehicle)
                                    <tr>
                                        <td><a  href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->owner->first_name.' '.$vehicle->owner->last_name}}</a></td>
                                        <td><a href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->manufacturer}}</a></td>
                                        <td><a href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->year }}</a></td>
                                        <td><a href="{{URL::to("vehicle/view",$vehicle->id)}}">{{$vehicle->deleted_at->format("d-m-Y")}} ({{$vehicle->deleted_at->diffForHumans()}})</a></td>
                                        <td><a href="{{URL::to("vehicle/restore",$vehicle->id)}}" class="btn btn-success"><i class="fa fa-rotate-left"></i>Restore</a></td>

                                    </tr>
                                @endforeach


                            </table>
                        @else
                            <div class="alert alert-info">No Vehicle Has Been Deleted From The System </div>
                        @endif
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>



@endsection
