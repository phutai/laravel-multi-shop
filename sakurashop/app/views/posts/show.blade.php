@extends('layouts.index')
@section('main')
	@if ($posts->count())
		<div>
			@foreach ($posts as $key => $value)
				{{$value->description}};
			@endforeach
		</div>
	@else
		Xin lỗi, không thể tìm thấy tin tức.
	@endif
@stop