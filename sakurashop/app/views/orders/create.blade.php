@extends('layouts.index')
<?php   $authentication = \App::make('authenticator'); ?>
@section('main')
    <div class="product-page">
        <div class="row">
            <div class="col-md-10 col-md-offset-0">
                <h1>Đặt mua</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                {{ Form::open(array('route' => 'orders.store', 'class' => 'form-horizontal')) }}

                <div class="form-group">
                {{ HTML::decode(Form::label('fullname', '<span class="required">*</span>Họ tên:', array('class'=>'col-sm-3 control-label'))) }}
                    <div class="col-sm-7">
                        {{ Form::text('fullname', Input::old('fullname') ? Input::old('fullname') : ((isset($user_login)? $user_login->profile->first_name : "")), array('class'=>'form-control', 'placeholder'=>'Họ tên')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ HTML::decode(Form::label('phone', '<span class="required">*</span>Phone:', array('class'=>'col-sm-3 control-label'))) }}
                    <div class="col-sm-7">
                        {{ Form::text('phone', Input::old('phone') ? Input::old('phone') : ((isset($user_login)? $user_login->profile->phone : "")), array('class'=>'form-control', 'placeholder'=>'Phone')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ HTML::decode(Form::label('address', '<span class="required">*</span>Địa chỉ:', array('class'=>'col-sm-3 control-label'))) }}
                    <div class="col-sm-7">
                        {{ Form::textarea('address', Input::old('address') ? Input::old('address') : ((isset($user_login)? $user_login->profile->address : "")), array('class'=>'form-control', 'placeholder'=>'Địa chỉ', 'rows'=>2)) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('note', 'Ghi chú:', array('class'=>'col-sm-3 control-label')) }}
                    <div class="col-sm-7">
                        {{ Form::textarea('note', Input::old('note'), array('class'=>'form-control', 'placeholder'=>'Ghi chú',  'rows'=>5)) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>

                    <div class="col-sm-7">
                        {{ Form::submit('Xác nhận đơn hàng', array('class' => 'btn btn-lg btn-primary btn-checkout')) }}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h4 class="title-main">Tóm tắt đơn hàng</h4>

                <div id="content-checkout-total">
                    <div class="form-group">
                        <div class="col-sm-6 control-label">Tổng số</div>
                        <div class="checkout-summary-info">{{{Cart::totalItems()}}}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 control-label">Tổng tạm</div>
                        <div class="checkout-summary-info">{{CommonHelper::format_money(Cart::total(false), 'VNĐ')}}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 control-label" id="checkout-ship-title">Chi phí vận chuyển</div>
                        <div class="checkout-summary" id="checkout-ship-info">(Chưa có)</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 control-label">Tổng cộng</div>
                        <div class="checkout-summary-info pi-price">{{CommonHelper::format_money(Cart::total(false), 'VNĐ')}}</div>
                    </div>
                </div>
            </div>
        </div>

        {{ Form::close() }}
    </div>
@stop


