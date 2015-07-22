@extends('admin.layouts.admin')

@section('main')

<h1>All Optionvalues</h1>

<p>{{ link_to_route('admin.optionvalues.create', 'Add New Optionvalue', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($optionvalues->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Option_id</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($optionvalues as $optionvalue)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no optionvalues
@endif

@stop
