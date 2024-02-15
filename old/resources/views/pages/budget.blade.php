@extends('layouts.app')

@section('content')
<h1>Budget</h1>
<p><a href="/app/budgets/create">Create New</a></p>

@if(session()->has('message'))
    {!! session('message') !!}
@endif

<form action="" method="GET" >
    <p>
        <select name="month">
            @for($i=1;$i<=12;$i++)
            <option value="{{$i}}"  @if(old('month',date('F'))==$i) selected @endif>{{date('F',strtotime('1977-'.$i.'-01'))}}</option>
            @endfor
        </select>
        <select name="year">
            @for($i=2020;$i<=date('Y')+1;$i++)
            <option value="{{$i}}" @if(old('year',date('Y'))==$i) selected @endif>{{$i}}</option>
            @endfor
        </select>
        <input type="submit" value="Submit" />
    </p>
</form>

@if(isset($account) && $accounts->count())
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