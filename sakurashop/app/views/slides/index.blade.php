@extends('layouts.scaffold')

@section('main')

<h1>All Slides</h1>

<p>{{ link_to_route('slides.create', 'Add New Slide', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($slides->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Sliders_id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th>Link</th>
				<th>Status</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($slides as $slide)
				<tr>
					<td>{{{ $slide->sliders_id }}}</td>
					<td>{{{ $slide->title }}}</td>
					<td>{{{ $slide->description }}}</td>
					<td>{{{ $slide->image }}}</td>
					<td>{{{ $slide->link }}}</td>
					<td>{{{ $slide->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('slides.destroy', $slide->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('slides.edit', 'Edit', array($slide->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no slides
@endif

@stop
