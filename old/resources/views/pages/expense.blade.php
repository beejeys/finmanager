@extends('layouts.app')

@section('content')
<h1>Expense</h1>
<p><a href="/app/expense/add">Add Expense</a></p>

@if(session()->has('message'))
    {!! session('message') !!}
@endif

<form action="" method="GET" >
    <p><input type="date" name="date" value="{{request()->date}}" /> <input type="submit" value="Submit" /></p>
</form>

@if(isset($expense) && count($expense))

<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>Account</th>
        <th>Amount</th>
        <th>&nbsp;</th>
    </tr>
    @foreach($expense as $entry)
    <tr>
        <td>{{$entry->id}}</td>
        <td>{{$entry->title}}</td>
        <td>{{$entry->accountFrom->name}}</td>
        <td>{{$entry->amount}}</td>
        <td><a href="/app/expense/{{$entry->id}}/edit?date={{request()->date}}">Edit</a> | <a href="/app/expense/{{$entry->id}}/del?date={{request()->date}}" onclick="return confirm('Are you sure?');return false;">Del</a></td>
    </tr>
    @endforeach
</table>
@else
<p>No entries found.</p>

@endif
@endsection