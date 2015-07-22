@extends('admin.layouts.admin')

@section('main')

<h1>Show Optionvalue</h1>

<p>{{ link_to_route('admin.optionvalues.index', 'Return to All optionvalues', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>Option_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $optionvalue->name }}}</td>
					<td>{{{ $optionvalue->option_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.optionvalues.destroy', $optionvalue->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.optionvalues.edit', 'Edit', array($optionvalue->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
