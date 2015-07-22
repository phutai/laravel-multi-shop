@extends('admin.layouts.admin')

@section('main')

<h1>All Options</h1>

<p>{{ link_to_route('admin.options.create', 'Add New Option', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($options->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($options as $option)
				<tr>
					<td>{{{ $option->name }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.options.destroy', $option->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.options.edit', 'Edit', array($option->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no options
@endif

@stop
