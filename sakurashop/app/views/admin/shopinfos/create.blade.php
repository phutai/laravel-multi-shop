@extends('admin.layouts.admin')

@section('main')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Shopinfo</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'admin.shopinfos.store', 'files'=>true, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('store_id', 'Chọn shop:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{Form::select('store_id', \admin\Store::lists('domain', 'id'), null, array('class' => 'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('store_name', 'Tên Shop:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('store_name', Input::old('store_name'), array('class'=>'form-control', 'placeholder'=>'Store_name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('store_address', 'Địa chỉ:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('store_address', Input::old('store_address'), array('class'=>'form-control', 'placeholder'=>'Store_address')) }}
            </div>
        </div>
         <div class="form-group">
                    <label class="col-md-2 control-label" for="exampleInputFile1">Banner:</label>

                    <div class="col-sm-10">
                        <input type="file" name="store_baner" class="form-control" accept="*.swf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="exampleInputFile1">Banner điện thoại:</label>

                    <div class="col-sm-10">
                        <input type="file" name="store_mobile" class="form-control">
                    </div>
                </div>
        <div class="form-group">
            {{ Form::label('store_map', 'Bản đồ:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('store_map', Input::old('store_map'), array('class'=>'form-control', 'placeholder'=>'Store_map')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('store_tel', 'Phone:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('store_tel', Input::old('store_tel'), array('class'=>'form-control', 'placeholder'=>'Store_tel')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('store_payment', 'Thanh toán:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('store_payment', Input::old('store_payment'), array('class'=>'form-control ckeditor', 'placeholder'=>'Store_payment')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('store_body', 'Giới thiệu:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('store_body', Input::old('store_body'), array('class'=>'form-control ckeditor', 'placeholder'=>'Store_body')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('store_zopim', 'Mã Zopim:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('store_zopim', Input::old('store_zopim'), array('class'=>'form-control', 'placeholder'=>'Mã Zopim')) }}
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


