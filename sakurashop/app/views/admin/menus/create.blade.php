@extends('admin.layouts.admin')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Menu</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'admin.menus.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
            {{ Form::hidden('alias', Input::old('alias'), array('class'=>'form-control', 'placeholder'=>'Alias', 'readonly'))}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('link', 'Link:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('link', Input::old('link'), array('class'=>'form-control', 'placeholder'=>'Link')) }}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="exampleInputFile1">Icon:</label>

            <div class="col-sm-10">
                <input type="file" name="icon" class="form-control" accept="*.swf">
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('link_manual', 'Link_manual:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('link_manual', Input::old('link_manual'), array('class'=>'form-control', 'placeholder'=>'Link_manual')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('category', Input::old('category'), array('class'=>'form-control', 'placeholder'=>'Category')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('display_text', 'Display_text:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('display_text', Input::old('display_text'), array('class'=>'form-control', 'placeholder'=>'Display_text')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('same_window', 'Same_window:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('same_window', Input::old('same_window'), array('class'=>'form-control', 'placeholder'=>'Same_window')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('show_image', 'Show_image:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('show_image', Input::old('show_image'), array('class'=>'form-control', 'placeholder'=>'Show_image')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('status', 'Published:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('status') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('parent', 'Parent:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('parent', Input::old('parent'), array('class'=>'form-control', 'placeholder'=>'Parent')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('order', 'Order:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('order', Input::old('order'), array('class'=>'form-control', 'placeholder'=>'Order')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('public', 'Public', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::radio('target', 'public') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('private', 'Private', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::radio('target', 'private', true) }}
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
            {{ Form::label('meta-keywords', 'Meta-keywords:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('meta-keywords', Input::old('meta-keywords'), array('class'=>'form-control ckeditor', 'placeholder'=>'Meta-keywords')) }}
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


