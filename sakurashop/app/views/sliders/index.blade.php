@extends('layouts.scaffold')

@section('main')

<h1>All Sliders</h1>

<p>{{ link_to_route('sliders.create', 'Add New Slider', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($sliders->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Position</th>
				<th>Type</th>
				<th>Status</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($sliders as $slider)
				<tr>
					<td>{{{ $slider->name }}}</td>
					<td>{{{ $slider->position }}}</td>
					<td>{{{ $slider->type }}}</td>
					<td>{{{ $slider->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('sliders.destroy', $slider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('sliders.edit', 'Edit', array($slider->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no sliders
@endif

@stop
