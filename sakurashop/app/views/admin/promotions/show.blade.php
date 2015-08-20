@extends('admin.layouts.admin')

@section('main')

<h1>Show Promotion</h1>

<p>{{ link_to_route('admin.promotions.index', 'Return to All promotions', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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
			<td>{{{ $promotion->name }}}</td>
					<td>{{{ $promotion->positison }}}</td>
					<td>{{{ $promotion->type }}}</td>
					<td>{{{ $promotion->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.promotions.destroy', $promotion->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.promotions.edit', 'Edit', array($promotion->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
