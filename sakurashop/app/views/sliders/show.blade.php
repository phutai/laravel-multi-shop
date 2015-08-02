@extends('layouts.scaffold')

@section('main')

<h1>Show Slider</h1>

<p>{{ link_to_route('sliders.index', 'Return to All sliders', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>Position</th>
				<th>Type</th>
				<th>Status</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
