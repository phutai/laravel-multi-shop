@extends('layouts.index')
@section('main')
	<table style="width:100%">
		<tr>
			<td>
				<span style="font-size: 12px; font-weight: bold;">{{$post->title}}</span>
				</br>
				<span style="font-size: 10px; color: #999999;">{{$post->updated_at}}</span>
				{{$post->description}}
			</td>
		</tr>
	</table>
@stop