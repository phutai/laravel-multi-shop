@extends('admin.layouts.admin')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Post</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'admin.posts.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control ckeditor', 'placeholder'=>'Description')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('alias', 'Alias:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('alias', Input::old('alias'), array('class'=>'form-control', 'placeholder'=>'Alias')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('meta-title', 'Meta-title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('meta-title', Input::old('meta-title'), array('class'=>'form-control', 'placeholder'=>'Meta-title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('meta-description', 'Meta-description:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('meta-description', Input::old('meta-description'), array('class'=>'form-control ckeditor', 'placeholder'=>'Meta-description')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('status', 'Status:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('status') }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}
<script src="{{URL::to("/js/ckeditor/ckeditor.js")}}" type="text/javascript"></script>
@stop


