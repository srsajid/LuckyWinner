@extends('layouts.sitepage')
@section('content')
    <div class="container main-container">
        <div class="row">
            @if (Session::has("error"))
                <div class="alert alert-danger alert-dismissible col-lg-offset-3 col-lg-6" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Warning!</strong> {{Session::get("error")}}
                </div>
            @endif
            @if (Session::has("success"))
                <div class="alert alert-success alert-dismissible col-lg-offset-3 col-lg-6" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success!</strong> {{Session::get("success")}}
                </div>
            @endif
            <form role="form" enctype="multipart/form-data" action="register" method="post">
                <div class="col-lg-offset-3 col-lg-6">
                    <h2 class="heading-title">Lucky Winner Registration Form</h2>
                    <h5 class="sub-heading">Visit us and fill up the reg form to be a weekly lucky winner to get exclusive gifts</h5>
                    <div class="well well-sm">
                        <strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong>
                    </div>
                    <div class="form-group">
                        <label>Enter Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{Input::old("name")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control"  name="email" placeholder="Enter Email" value="{{Input::old("email")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control"name="confirm_email" placeholder="Confirm Email" value="{{Input::old("confirm_name")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('confirm_email')) <p class="help-block">{{ $errors->first('confirm_email') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{Input::old("phone")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <div class="input-group">
                            <textarea name="address" class="form-control" rows="5">{{Input::old("address")}}</textarea>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default btn-lg pull-right">
                </div>
            </form>
        </div>
    </div>
@stop

