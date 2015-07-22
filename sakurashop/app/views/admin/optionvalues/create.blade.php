@extends('admin.layouts.admin')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Optionvalue</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'admin.optionvalues.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('option_id', 'Option_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{--{{ Form::input('number', 'option_id', Input::old('option_id'), array('class'=>'form-control')) }}--}}
                {{Form::select('option_id', \admin\Option::lists('name', 'id'), null, array('class' => 'form-control'))}}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


