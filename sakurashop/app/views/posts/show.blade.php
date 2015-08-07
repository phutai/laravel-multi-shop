@extends('layouts.index')
@section('main')
	<?php $meta_title = 'meta-title'; $meta_description = 'meta-description';?>
	<table style="width:100%">
		<tr style="border-bottom: 1px solid gray; border-collapse: collapse;">
			<td><h1>Tin Tức</h1></td>
			<td>{!! $posts->render() !!}</td>
		</tr>
	 	@if ($posts->count())
			<div>
				@foreach ($posts as $key => $post)
					<tr style="border-bottom: 1px solid gray; border-collapse: collapse;">
						<td style="padding-top: 15px;" colspan="2">
							<span style="font-size: 12px; font-weight: bold;"><a href="{{URL::to("/")}}/posts/{{{$post->alias}}}" style="color: #3d3d3d;">{{$meta_title}}</a></span>
							</br>
							<span style="font-size: 10px; color: #999999;">{{$post->updated_at}}</span>
							{{$meta_description}}
						</td>
					</tr>
				@endforeach
			</div>
		@else
			Xin lỗi, không thể tìm thấy tin tức.
		@endif
	</table>
@stop