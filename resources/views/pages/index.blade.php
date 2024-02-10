@extends('layouts.app')

@section('content')
<h1>Welcome to Benbelon</h1>

<form action="" method="GET" >
    <p><input type="date" name="date" value="{{request()->date}}" /> <input type="submit" value="Submit" /></p>
</form>

<table cellpadding="10" ccellspacing="0" border="1">
    <tr>
        <th>Date</th>
        <th>Title</th>
        <th>Expense</th>
        <th>Income</th>
        <th>Account</th>
        <th>Balance</th>
    </tr>
    @foreach($transactions as $transaction)
    <tr>
        <td>{{date('d M Y',strtotime($transaction->happened_at))}}</td>
        <td>{{$transaction->title}}</td>
        <td>@if($transaction->type=='expense') {{$transaction->amount}} @endif</td>
        <td>@if($transaction->type=='income') {{$transaction->amount}} @endif</td>
        <td>{{$transaction->title}}</td>
        <td></td>
    </tr>
    @endforeach
</table>
@endsection