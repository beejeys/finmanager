@extends('layouts.app')

@section('content')
<h1>Add Expense</h1>
<p><a href="/app/expense">All expense transactions</a></p>
<form action="" method="POST">
    @csrf
    <table cellpadding="10" cellspacing="0" border="1">
        <tr>
            <th>Date</th>
            <td><input type="date" name="happened_at" value="{{old('happened_at',isset($expense) ? $expense->happened_at:request()->date)}}" required /></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><input type="text" name="title" value="{{old('name',isset($expense) ? $expense->title:'')}}" required /></td>
        </tr>

        <tr>
            <th>Description</th>
            <td><textarea name="description" >{!!old('description',isset($expense) ? $expense->description:'')!!}</textarea></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td><input type="text" name="amount" value="{{old('amount',isset($expense) ? $expense->amount:'')}}" required /></td>
        </tr>
        
        <tr>
            <th>Category</th>
            <td>
                <select name="category_id" >
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(old('category_id',isset($expense) ? $expense->category_id:'') == $category->id) selected @endif>{{str_repeat('--',$category->level).' '.$category->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <th>Account</th>
            <td>
                <select name="account_from" >
                    @foreach($accounts as $account)
                    <option value="{{$account->id}}" @if(old('parent_id',isset($expense) ? $expense->account_from:'') == $account->id) selected @endif>{{$account->name}}</option>
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