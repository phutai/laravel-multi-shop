@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">


        <div class="portlet light">

            <div class="portlet-title">
                <h1>{{Lang::get('products.create_product')}}</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                </div>
            @endif
            <div class="portlet-body form">

                {{ Form::open(array('route' => 'admin.products.store', 'files'=>true, 'class' => 'form-horizontal')) }}



                <div class="form-group">
                    {{ Form::label('model', Lang::get('products.model'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('model', Input::old('model'), array('class'=>'form-control', 'placeholder'=>'Model')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('name', Lang::get('products.name'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=> Lang::get('products.name'))) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('manufacturer_id', 'Mã nhà sản xuất:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                      {{ Form::text('manufacturer_id', Input::old('manufacturer_id'), array('class'=>'form-control', 'placeholder'=>'Mã nhà sản xuất')) }}
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('special_price', Lang::get('products.special_price'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('special_price', Input::old('special_price'), array('class'=>'form-control', 'placeholder'=>Lang::get('products.special_price'))) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('sale_price', Lang::get('products.sale_price'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('sale_price', Input::old('sale_price'), array('class'=>'form-control', 'placeholder'=>Lang::get('products.sale_price'))) }}
                    </div>
                </div>
                <div class="form-group hidden">
                    {{ Form::label('quantity', Lang::get('products.quantity'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::input('number', 'quantity', (Input::old('quantity'))? Input::old('quantity') : 10000, array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Lang::get('products.category');}}</label>

                    <div class="col-sm-10">
                        {{Form::select('category_id', \admin\Category::lists('name', 'id'), null, array('class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('size', Lang::get('products.size'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('size', Input::old('size'), array('class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Size')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('material', Lang::get('products.material'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('material', Input::old('material'), array('class'=>'form-control', 'rows'=>'2', 'placeholder'=> Lang::get('products.material'))) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('color', Lang::get('products.color'), array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('color', Input::old('color'), array('class'=>'form-control', 'rows'=>'2', 'placeholder'=>Lang::get('products.color'))) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="exampleInputFile1">{{Lang::get('products.image')}}</label>

                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="exampleInputFile1">{{Lang::get('products.large_image')}}</label>

                    <div class="col-sm-10">
                        <input type="file" name="large_image" class="form-control" accept="image/*">
                    </div>
                </div>
                @foreach($options as $opt)
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="exampleInputFile1">Chọn {{{$opt['name']}}}</label>
                        <div class="col-sm-10">
                        {{Form::select('option[]', CommonHelper::array_selects($opt), null, array('class' => 'form-control chosen-select', 'multiple'))}}
                        </div>
                    </div>
                @endforeach


                {{--<div class="form-group">--}}
                    {{--{{ Form::label('meta_title', Lang::get('products.meta_title'), array('class'=>'col-md-2 control-label')) }}--}}
                    {{--<div class="col-sm-10">--}}
                        {{--{{ Form::textarea('meta_title', Input::old('meta_title'), array('class'=>'form-control','rows'=>'3', 'placeholder'=> Lang::get('products.meta_title'))) }}--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--{{ Form::label('meta_keywords', Lang::get('products.meta_keywords'), array('class'=>'col-md-2 control-label')) }}--}}
                    {{--<div class="col-sm-10">--}}
                        {{--{{ Form::textarea('meta_keywords', Input::old('meta_keywords'), array('class'=>'form-control','rows'=>'3', 'placeholder'=> Lang::get('products.meta_keywords'))) }}--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--{{ Form::label('meta_description', Lang::get('products.meta_description'), array('class'=>'col-md-2 control-label')) }}--}}
                    {{--<div class="col-sm-10">--}}
                        {{--{{ Form::textarea('meta_description', Input::old('meta_description'), array('class'=>'form-control','rows'=>'3', 'placeholder'=>Lang::get('products.meta_description'))) }}--}}
                    {{--</div>--}}
                {{--</div>--}}


                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>

                    <div class="col-sm-10">
                        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <link type="text/css" rel="stylesheet" href="{{URL::to("/assets/admin/layout2/css/chosen.min.css")}}" />
    <script type="text/javascript" src="{{URL::to("/assets/admin/layout2/scripts/chosen.jquery.min.js")}}"></script>
    <script>
        jQuery(document).ready(function(){
            $(".chosen-select").chosen();
        })
    </script>
    @stop


