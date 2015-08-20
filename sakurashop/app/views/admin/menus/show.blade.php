@extends('admin.layouts.admin')

@section('main')

<h1>Show Menu</h1>

<p>{{ link_to_route('admin.menus.index', 'Return to All menus', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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
			<td>{{{ $menu->name }}}</td>
					<td>{{{ $menu->positison }}}</td>
					<td>{{{ $menu->type }}}</td>
					<td>{{{ $menu->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.menus.destroy', $menu->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.menus.edit', 'Edit', array($menu->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
