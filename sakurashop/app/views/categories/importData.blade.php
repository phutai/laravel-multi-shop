@extends('layouts.index')

@section('main')
    <h1>Import Data</h1>
    {{ Form::open(array('action' => array('CategoriesController@importData'))) }}
    	{{ Form::text('pathFile', 'path file json')}}
    	{{ Form::submit('Register') }}
    {{ Form::close()}}
@stop