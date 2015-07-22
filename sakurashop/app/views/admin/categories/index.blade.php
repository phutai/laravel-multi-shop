@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <h1>All Categories</h1>
            </div>
            <div class="portlet-body">
                <p>{{ link_to_route('admin.categories.create', 'Add New Category', null, array('class' => 'btn btn-lg btn-success')) }}</p>

                @if ($categories->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="25%">Name</th>
                            <th width="50%">Description</th>
                            <th>Status</th>

                            <th>&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{{ $category->name }}}</td>
                                <td>{{{ $category->description }}}</td>
                                <td>{{{ $category->status }}}</td>

                                <td>
                                    {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.categories.destroy', $category->id))) }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                    {{ Form::close() }}
                                    {{ link_to_route('admin.categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-info')) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    @else
        There are no categories
    @endif

@stop
