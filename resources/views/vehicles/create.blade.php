
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
            <form class="form-horizontal" action='{{URL::to("vehicle/create")}}' method="POST">
                <fieldset>
                    <div >
                        <legend class="">Vehicle Information</legend>
                    </div>

                    {{csrf_field()}}
                    <div class="form-group">
                        <!-- Manufacturer -->
                        <label class="label"  for="manufacturer">Manufacturer</label>

                            <input type="text" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="Manufacturer (e.g. Volkswagon) " class="form-control">
                        @if ($errors->has('manufacturer'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Type -->
                        <label class="label"  for="type">Type</label>

                            <input type="text" name="type" value="{{ old('type') }}" placeholder="Type (e.g. Polo) " class="form-control">
                        @if ($errors->has('type'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Year -->
                        <label class="label"  for="year">Year</label>
                            <input type="text" name="year" value="{{ old('year') }}" placeholder="Year (e.g. 2017) " class="form-control">

                        @if ($errors->has('year'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                        @endif


                    </div>
                    <div class="form-group">
                        <!-- Color -->
                        <label class="label"  for="color">Color</label>

                            <input type="text" name="color"  value="{{ old('color') }}" placeholder="Color (e.g. Red) " class="pick-a-color form-control">
                        @if ($errors->has('color'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Year -->
                        <label class="label"  for="millage">Mileage</label>

                            <input type="text" name="millage" value="{{ old('millage') }}" placeholder="Mileage (e.g. 1920 KM) " class="form-control">

                        @if ($errors->has('millage'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('millage') }}</strong>
                                    </span>
                        @endif
                    </div>
                </fieldset>
                <fieldset>
                    <hr>
                    <div >
                        <legend class="">Owner Information</legend>
                    </div>
                    <div class="form-group">
                        <!-- First Name -->
                        <label class="label"  for="type">First Name</label>

                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Owner's First Name " class="form-control">
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Last Name -->
                        <label class="label"  for="type">Last Name</label>

                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Owner's Last Name " class="form-control">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Contact Number -->
                        <label class="label"  for="type">Contact Number</label>

                        <input type="text" name="contact_number" value="{{ old('contact_number') }}"  placeholder="Owner's Contact Number" class="form-control">
                        @if ($errors->has('contact_number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('contact_number') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Email Address -->
                        <label class="label"  for="type">Email Address</label>

                        <input type="text" name="email_address" value="{{ old('email_address') }}" placeholder="Owner's Email Address" class="form-control">

                        @if ($errors->has('email_address'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email_address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </fieldset>



                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success"><i class="fa fa-plus"></i>Register</button>
                    </div>
                </div>
            </form>


        </div>
        </div>
    </div>
@endsection
