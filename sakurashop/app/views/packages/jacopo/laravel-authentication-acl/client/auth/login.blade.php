<?php
$shopinfo = CommonHelper::getInfo();
if(CommonHelper::isMobile()) $isMobile = true;
if(CommonHelper::isTablet()) $isTablet = true;
?>

@extends('layouts.index')
@section('title')
User login
@stop
@section('main')
<div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin">{{{Lang::get('common.login')}}}</h3>
            </div>
            <?php $message = Session::get('message'); ?>
            @if( isset($message) )
            <div class="alert alert-success">{{$message}}</div>
            @endif
            @if($errors && ! $errors->isEmpty() )
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @endif
            <div class="panel-body">
                {{Form::open(array('url' => URL::action("Jacopo\Authentication\Controllers\AuthController@postClientLogin"), 'method' => 'post') )}}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                {{Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Địa chỉ Email', 'required', 'autocomplete' => 'off'])}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                {{Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete' => 'off'])}}
                            </div>
                        </div>
                    </div>
                </div>
                {{Form::label('remember','Ghi nhớ')}}
                {{Form::checkbox('remember')}}
                <input type="submit" value="{{{Lang::get('common.login')}}}" class="btn btn-info btn-block">
                {{Form::close()}}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 margin-top-10">
        <a href="{{URL::action('Jacopo\Authentication\Controllers\UserController@signup')}}"><i class="fa fa-sign-in"></i> Đăng kí</a>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@stop