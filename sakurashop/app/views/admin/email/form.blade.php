@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">
        <style>
            .label-from {
                border: none !important;

            }

            .right {
                text-align: right;
                padding: 7px;
            }

            .total {
                font-size: 20px;
                color: red;
                font-weight: bold;
            }
        </style>

        <div class="portlet light">

            <div class="portlet-title">
                <h1>Gửi mail thành viên</h1>
            </div>
            @if(Session::has('success'))
                <div class="alert-box success">
                    <h2>{{ Session::get('success') }}</h2>
                </div>
            @endif
            <div class="portlet-body form">
                {{ Form::model(null, array('files'=>true,'class' => 'form-horizontal', 'method' => 'POST', 'route' => 'sendMail')) }}

                <div class="form-group">
                    {{ Form::label('subject', 'Tiêu đề', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                         {{ Form::text('subject', Input::old('subject'), array('class'=>'form-control', 'placeholder'=>'subject', 'required' => 'required')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('contents', 'Nội dung:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('contents', Input::old('contents'), array('class'=>'form-control', 'placeholder'=>'contents', 'required' => 'required')) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>

                    <div class="col-sm-10">
                        {{--{{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}--}}
                        {{ link_to_route('admin.orders.index', 'Quay lại', null, array('class' => 'btn btn-lg btn-default')) }}
                        {{ Form::submit('Gửi', array('class' => 'btn btn-lg btn-primary')) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop