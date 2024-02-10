@extends('layouts.app')

@section('content')
<h1>Income</h1>
<p><a href="/app/income/add">Add Income</a></p>

@if(session()->has('message'))
    {!! session('message') !!}
@endif

<form action="" method="GET" >
    <p><input type="date" name="date" value="{{request()->date}}" /> <input type="submit" value="Submit" /></p>
</form>

@if(isset($income) && count($income))

<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>Account</th>
        <th>Amount</th>
        <th>&nbsp;</th>
    </tr>
    @foreach($income as $entry)
    <tr>
        <td>{{$entry->id}}</td>
        <td>{{$entry->title}}</td>
        <td>{{$entry->accountTo->name}}</td>
        <td>{{$entry->amount}}</td>
        <td><a href="/app/income/{{$entry->id}}/edit?date={{request()->date}}">Edit</a> | <a href="/app/income/{{$entry->id}}/del?date={{request()->date}}" onclick="return confirm('Are you sure?');return false;">Del</a></td>
    </tr>
    @endforeach
</table>
@else
<p>No entries found.</p>

@endif
@endsection