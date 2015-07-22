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

                {{ Form::model($product, array('files'=>true,'class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.products.update', $product->id))) }}
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
                    <label class="col-md-2 control-label"
                           for="exampleInputFile1">{{Lang::get('products.image')}}</label>

                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"
                           for="exampleInputFile1">{{Lang::get('products.large_image')}}</label>

                    <div class="col-sm-10">
                        <input type="file" name="large_image" class="form-control" accept="image/*">
                    </div>
                </div>
                <?php
                // echo '<pre>';
                //print_r();die;
                $seleted = array_fetch($product->options->toArray(), 'optionvalue_id')
                ?>

                @foreach($options as $opt)
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="exampleInputFile1">Chọn {{{$opt['name']}}}</label>

                        <div class="col-sm-10">
                            {{--{{Form::select('option[]', , null, array('class' => 'form-control chosen-select', 'multiple'))}}--}}

                            <select class="form-control chosen-select" multiple name="option[]">
                                @foreach(CommonHelper::array_selects($opt) as $kei => $select)

                                    <option @if(in_array($kei, $seleted))
                                        selected
                                        @endif
                                        value="{{{$kei}}}">{{{$select}}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>

                    <div class="col-sm-10">
                        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                        {{ link_to_route('admin.products.index', 'Cancel', null, array('class' => 'btn btn-lg btn-default')) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <link type="text/css" rel="stylesheet" href="{{URL::to("/assets/admin/layout2/css/chosen.min.css")}}"/>
    <script type="text/javascript" src="{{URL::to("/assets/admin/layout2/scripts/chosen.jquery.min.js")}}"></script>
    <script>
        jQuery(document).ready(function () {
            $(".chosen-select").chosen();
        })
    </script>
@stop