@extends('layouts.scaffold')

@section('main')

<h1>Show Slide</h1>

<p>{{ link_to_route('slides.index', 'Return to All slides', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Sliders_id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th>Link</th>
				<th>Status</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
