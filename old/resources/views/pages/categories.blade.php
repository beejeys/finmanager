@extends('layouts.app')

@section('content')
<h1>Categories</h1>
<p><a href="/app/categories/create">Create New</a></p>

@if(session()->has('message'))
    {!! session('message') !!}
@endif

@if(count($categories))
<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th></th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{str_repeat('-',$category->level).' '.$category->name}}</td>
        <td>{{$category->type}}</td>
        <td><a href="/app/categories/{{$category->id}}/edit">Edit</a> | <a href="/app/categories/{{$category->id}}/del" onclick="return confirm('Are you sure?');return false;">Del</a></td>
    </tr>
    @endforeach
</table>
@else
<p>No accounts found.</p>

@endif
@endsection