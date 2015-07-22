@extends('admin.layouts.admin')

@section('main')

<h1>Show Store</h1>

<p>{{ link_to_route('admin.stores.index', 'Return to All stores', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Domain</th>
				<th>Store_name</th>
				<th>Owner_name</th>
				<th>Period</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $store->domain }}}</td>
					<td>{{{ $store->store_name }}}</td>
					<td>{{{ $store->owner_name }}}</td>
					<td>{{{ $store->period }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.stores.destroy', $store->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.stores.edit', 'Edit', array($store->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
