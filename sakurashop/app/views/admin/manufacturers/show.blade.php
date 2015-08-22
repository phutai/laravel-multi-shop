@extends('admin.layouts.admin')

@section('main')

<h1>Show Manufacturer</h1>

<p>{{ link_to_route('admin.manufacturers.index', 'Return to All manufacturers', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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
			<td>{{{ $manufacturer->name }}}</td>
					<td>{{{ $manufacturer->positison }}}</td>
					<td>{{{ $manufacturer->type }}}</td>
					<td>{{{ $manufacturer->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.manufacturers.destroy', $manufacturer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.manufacturers.edit', 'Edit', array($manufacturer->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
