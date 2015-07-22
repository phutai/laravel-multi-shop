@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">
        <div class="portlet light">

            <div class="portlet-title">
                <h1>{{Lang::get('category.edit_category')}}</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                </div>
            @endif
            <div class="portlet-body form">
                {{ Form::model($category, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.categories.update', $category->id))) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
                    </div>
                </div>


                {{--<div class="form-group">--}}
                {{--{{ Form::label('parent_id', 'Parent_id:', array('class'=>'col-md-2 control-label')) }}--}}
                {{--<div class="col-sm-10">--}}
                {{--{{ Form::input('number', 'parent_id', Input::old('parent_id'), array('class'=>'form-control')) }}--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    {{ Form::label('description', 'Description:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control', 'placeholder'=>'Description')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('meta_description', 'Meta_description:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('meta_description', Input::old('meta_description'), array('class'=>'form-control', 'placeholder'=>'Meta_description')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('meta_keyword', 'Meta_keyword:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('meta_keyword', Input::old('meta_keyword'), array('class'=>'form-control', 'placeholder'=>'Meta_keyword')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('sort_order', 'Sort_order:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::input('number', 'sort_order', Input::old('sort_order'), array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>

                    <div class="col-sm-10">
                        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                        {{ link_to_route('admin.categories.show', 'Cancel', $category->id, array('class' => 'btn btn-lg btn-default')) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop