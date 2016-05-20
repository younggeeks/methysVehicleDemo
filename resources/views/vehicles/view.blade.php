

@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-sm-6 col-sm-offset-3">
                <a href="{{URL::to("/")}}" class="btn btn-success">&laquo; All Vehicles</a>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{$vehicle->manufacturer. ' '.$vehicle->type}} </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            {{--<div class="col-md-3 col-lg-3 " align="center">--}}

                {{--<img alt="Car Pic" src="" class="img-circle img-responsive"> </div>--}}

            <div class="col-md-9 col-lg-9 ">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Manufacturer:</td>
                        <td>{{$vehicle->manufacturer}}</td>
                    </tr>
                    <tr>
                        <td>Type :</td>
                        <td>{{$vehicle->type}}</td>
                    </tr>
                    <tr>
                        <td>Manufacturing Year</td>
                        <td>{{$vehicle->year}}</td>
                    </tr>

                    <tr>
                    <tr>
                        <td>Color</td>
                        <td><div style="background:#{{$vehicle->color}};" id="color"></div></td>
                    </tr>
                    <tr>
                        <td>Mileage</td>
                        <td>{{$vehicle->millage}}</td>
                    </tr>
                    <tr>
                        <td>Owner's First Name</td>
                        <td>{{$vehicle->owner->first_name}} </td>
                    </tr>
                    <td>Owner's Last Name</td>
                    <td>{{$vehicle->owner->last_name}}
                    </td>

                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="panel-footer">
        Owner's Contacts - <strong>  <a href="mailto:samjunior@gmail.com"> <i class="fa fa-envelope-o"></i> {{$vehicle->owner->email}}</a> | <i class="fa fa-phone"></i> {{$vehicle->owner->contact_number}} </strong>
                        <span class="pull-right">
                             </span>
    </div>


            </div>
        </div>
        </div>
        </div>
@endsection
