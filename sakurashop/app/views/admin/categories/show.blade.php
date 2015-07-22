@extends('layouts.scaffold')

@section('main')

	<h1>Show Category</h1>

	<p>{{ link_to_route('admin.categories.index', 'Return to All categories', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

	<table class="table table-striped">
		<thead>
		<tr>
			<th>Name</th>
			<th>Status</th>
			<th>Parent_id</th>
			<th>Description</th>
			<th>Meta_description</th>
			<th>Meta_keyword</th>
			<th>Sort_order</th>
			<th>Alias</th>
		</tr>
		</thead>

		<tbody>
		<tr>
			<td>{{{ $category->name }}}</td>
			<td>{{{ $category->status }}}</td>
			<td>{{{ $category->parent_id }}}</td>
			<td>{{{ $category->description }}}</td>
			<td>{{{ $category->meta_description }}}</td>
			<td>{{{ $category->meta_keyword }}}</td>
			<td>{{{ $category->sort_order }}}</td>
			<td>{{{ $category->alias }}}</td>
			<td>
				{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.categories.destroy', $category->id))) }}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
				{{ link_to_route('admin.categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-info')) }}
			</td>
		</tr>
		</tbody>
	</table>

@stop