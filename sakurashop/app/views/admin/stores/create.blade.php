@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">


        <div class="portlet light">

            <div class="portlet-title">
                <h1>Create Store</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                </div>
            @endif
        {{ Form::open(array('route' => 'admin.stores.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('domain', 'Domain:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('domain', Input::old('domain'), array('class'=>'form-control', 'placeholder'=>'Domain')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('store_name', 'Store_name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::textarea('store_name', Input::old('store_name'), array('class'=>'form-control', 'placeholder'=>'Store_name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('owner_name', 'Owner_name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::textarea('owner_name', Input::old('owner_name'), array('class'=>'form-control', 'placeholder'=>'Owner_name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('period', 'Period:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('period', Input::old('period'), array('class'=>'form-control', 'placeholder'=>'Period')) }}
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
            </div>
        </div>

        {{ Form::close() }}
        </div>
    </div>


@stop


