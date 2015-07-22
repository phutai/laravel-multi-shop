@extends('admin.layouts.admin')

@section('main')

<h1>Show Product</h1>

<p>{{ link_to_route('admin.products.index', 'Return to All products', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Sale_price</th>
				<th>Special_price</th>
				<th>Model</th>
				<th>Alias</th>
				<th>Quantity</th>
				<th>Name</th>
				<th>Category_id</th>
				<th>Size</th>
				<th>Material</th>
				<th>Color</th>
				<th>Image</th>
				<th>Status</th>
				<th>Description</th>
				<th>Meta_title</th>
				<th>Meta_keywords</th>
				<th>Meta_description</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $product->sale_price }}}</td>
					<td>{{{ $product->special_price }}}</td>
					<td>{{{ $product->model }}}</td>
					<td>{{{ $product->alias }}}</td>
					<td>{{{ $product->quantity }}}</td>
					<td>{{{ $product->name }}}</td>
					<td>{{{ $product->category_id }}}</td>
					<td>{{{ $product->size }}}</td>
					<td>{{{ $product->material }}}</td>
					<td>{{{ $product->color }}}</td>
					<td>{{{ $product->image }}}</td>
					<td>{{{ $product->status }}}</td>
					<td>{{{ $product->description }}}</td>
					<td>{{{ $product->meta_title }}}</td>
					<td>{{{ $product->meta_keywords }}}</td>
					<td>{{{ $product->meta_description }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.products.destroy', $product->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
