@extends('layouts.app')

@section('content')
<h1>Create Account</h1>
<p><a href="/app/accounts">All accounts</a></p>
<form action="" method="POST">
    @csrf
    <table cellpadding="10" cellspacing="0" border="1">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="{{old('name',isset($account) ? $account->name:'')}}" required /></td>
        </tr>
        <tr>
            <th>Opening Balance</th>
            <td><input type="number" name="balance" value="{{old('balance',isset($account) ? $account->balance:'0.00')}}" required /></td>
        </tr>
        <tr>
            <th>Type</th>
            <td>
                <select name="type" required>
                    <option value="bank" @if(old('type',isset($account) ? $account->type:'') == 'bank') selected @endif>Bank</option>
                    <option value="credit_card" @if(old('type',isset($account) ? $account->type:'') == 'credit_card') selected @endif>Credit Card</option>
                    <option value="cash" @if(old('type',isset($account) ? $account->type:'') == 'cash') selected @endif>Cash</option>
                    <option value="other" @if(old('type',isset($account) ? $account->type:'') == 'other') selected @endif>Other</option>
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