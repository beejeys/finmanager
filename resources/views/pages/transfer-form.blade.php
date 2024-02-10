@extends('layouts.app')

@section('content')
<h1>Add Transfer</h1>
<p><a href="/app/transfer">All transfers</a></p>
<form action="" method="POST">
    @csrf
    <table cellpadding="10" cellspacing="0" border="1">
        <tr>
            <th>Date</th>
            <td><input type="date" name="happened_at" value="{{old('happened_at',isset($transfer) ? $transfer->happened_at:request()->date)}}" required /></td>
        </tr>
        <tr>
            <th>Title</th>
            <td><input type="text" name="title" value="{{old('name',isset($transfer) ? $transfer->title:'')}}" required /></td>
        </tr>

        <tr>
            <th>Description</th>
            <td><textarea name="description" >{!!old('description',isset($transfer) ? $transfer->description:'')!!}</textarea></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td><input type="text" name="amount" value="{{old('amount',isset($transfer) ? $transfer->amount:'')}}" required /></td>
        </tr>

        <tr>
            <th>From</th>
            <td>
                <select name="account_from" >
                    @foreach($accounts as $account)
                    <option value="{{$account->id}}" @if(old('parent_id',isset($transfer) ? $transfer->account_from:'') == $account->id) selected @endif>{{$account->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        
        <tr>
            <th>To</th>
            <td>
                <select name="account_to" >
                    @foreach($accounts as $account)
                    <option value="{{$account->id}}" @if(old('parent_id',isset($transfer) ? $transfer->account_to:'') == $account->id) selected @endif>{{$account->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>

        
        <tr>
            <th>&nbsp;</th>
            <td><input type="submit" value="Submit" /></td>
        </tr>
        
    </table>
</form>
@endsection