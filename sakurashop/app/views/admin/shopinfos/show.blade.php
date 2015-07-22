@extends('layouts.scaffold')

@section('main')

<h1>Show Shopinfo</h1>
<p>{{ link_to_route('admin.shopinfos.index', 'Return to All shopinfos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Store_id</th>
				<th>Store_name</th>
				<th>Store_address</th>
				<th>Store_baner</th>
				<th>Store_tel</th>
				<th>Store_payment</th>
				<th>Store_body</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $shopinfo->store_id }}}</td>
					<td>{{{ $shopinfo->store_name }}}</td>
					<td>{{{ $shopinfo->store_address }}}</td>
					<td>{{{ $shopinfo->store_baner }}}</td>
					<td>{{{ $shopinfo->store_tel }}}</td>
					<td>{{{ $shopinfo->store_payment }}}</td>
					<td>{{{ $shopinfo->store_body }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.shopinfos.destroy', $shopinfo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.shopinfos.edit', 'Edit', array($shopinfo->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
