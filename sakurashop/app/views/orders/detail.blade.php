@extends('layouts.index')

@section('main')

<div class="form-group">
               

                    <div class="row col-md-12 custyle">
                        <table class="table table-striped custab">
                            <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Model</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th class="text-center">Tổng</th>
                            </tr>
                            </thead>

                            @foreach($order->order_detail as $product)
                                <tr>
                                    <td>
                                        <img src="/images/cache/{{Config::get('configs.thumb_image')}}/{{$product->image}}"
                                             style="border: 1px solid #DDDDDD; width: 100px; height:137px;"></td>
                                    <td>{{{$product->name}}}

                                        <?php $options = json_decode($product->options, true) ?>
                                        @if(count($options))
                                            <br/>
                                            <small>
                                                @foreach($options as $option)
                                                    {{$option}}<br/>
                                                @endforeach
                                            </small>
                                        @endif

                                    </td>
                                    <td>{{{$product->model}}}</td>
                                    <td>{{{$product->quantity}}}</td>
                                    <td>{{{CommonHelper::format_money($product->price)}}}</td>
                                    <td class="text-center">{{{CommonHelper::format_money($product->total)}}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="right">Tổng số lượng:</td>
                                <td class="right total">{{$order->quantity}}</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="right">Thành tiền:</td>
                                <td class="right total">{{{CommonHelper::format_money($order->total)}}}</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="right">Tổng cộng :</td>
                                <td class="right total">{{{CommonHelper::format_money($order->total)}}}</td>
                            </tr>

                        </table>
                    </div>
                </div>

            <div class="row">
                <div class="form-group">
                    {{ Form::label('fullname', 'Họ tên:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        <span class="form-control label-from">{{{$order->fullname}}}</span>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('phone', 'Phone:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        <span class="form-control label-from">{{{$order->phone}}}</span>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Địa chỉ:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        <span class="form-control label-from">{{{$order->address}}}</span>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('note', 'Ghi chú:', array('class'=>'col-md-2 control-label')) }}
                    <div class="col-sm-10">
                        <span class="form-control label-from">{{{$order->note}}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>

                    <div class="col-sm-10">
                        {{--{{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}--}}
                    </div>
                </div>
            </div>
@stop