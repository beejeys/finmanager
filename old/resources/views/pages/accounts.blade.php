@extends('layouts.app')

@section('content')
<h1>Accounts</h1>
<p><a href="/app/accounts/create">Create New</a></p>

@if(session()->has('message'))
    {!! session('message') !!}
@endif

@if($accounts->count())
<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Opening Balance</th>
        <th></th>
    </tr>
    @foreach($accounts as $account)
    <tr>
        <td>{{$account->id}}</td>
        <td>{{$account->name}}</td>
        <td>{{ucwords(strtolower(str_replace('_',' ',$account->type)))}}</td>
        <td align="right">{{$account->balance}}</td>
        <td><a href="/app/accounts/{{$account->id}}/edit">Edit</a> | <a href="/app/accounts/{{$account->id}}/del" onclick="return confirm('Are you sure?');return false;">Del</a></td>
    </tr>
    @endforeach
</table>
@else
<p>No accounts found.</p>

@endif
@endsection