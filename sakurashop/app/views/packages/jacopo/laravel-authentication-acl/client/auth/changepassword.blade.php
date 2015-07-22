<?php
$shopinfo = CommonHelper::getInfo();
if(CommonHelper::isMobile()) $isMobile = true;
?>
@extends('layouts.index')
@section('title')
Change password
@stop
@section('main')
 <div class="row centered-form">
        <br>
        <br>
        <div class="col-xs-12 col-sm-8 col-md-9 col-sm-offset-1 ">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Đổi thông tin cá nhân<h3>
            </div>
            @if($errors && ! $errors->isEmpty() )
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @endif
            <div class="panel-body">
                {{Form::open(array('url' => URL::action("Jacopo\Authentication\Controllers\AuthController@postChangePassword"), 'method' => 'post') )}}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {{Form::label('name', 'Tên: ')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                {{Form::text('name', Input::old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'họ tên', 'required', 'autocomplete' => 'off'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone: ')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                {{Form::text('phone', Input::old('phone'), ['id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone', 'required', 'autocomplete' => 'off'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('address', 'Địa chỉ: ')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                {{Form::text('address', Input::old('address'), ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Địa chỉ', 'required', 'autocomplete' => 'off'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('password', 'Mật khẩu mới: ')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                {{Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'New password', 'required', 'autocomplete' => 'off'])}}
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Cập nhật" class="btn btn-info btn-block">
                {{Form::hidden('email',$email)}}
                {{Form::hidden('token',$token)}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop