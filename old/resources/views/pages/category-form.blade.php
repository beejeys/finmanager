@extends('layouts.app')

@section('content')
<h1>Create Category</h1>
<p><a href="/app/categories">All categories</a></p>
<form action="" method="POST">
    @csrf
    <table cellpadding="10" cellspacing="0" border="1">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="{{old('name',isset($category) ? $category->name:'')}}" required /></td>
        </tr>
        <tr>
            <th>Type</th>
            <td>
                <select name="type" required>
                    <option value="expense" @if(old('type',isset($category) ? $category->type:'') == 'expense') selected @endif>Expense</option>
                    <option value="income" @if(old('type',isset($category) ? $category->type:'') == 'income') selected @endif>Income</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Parent Category(Optional)</th>
            <td>
                <select name="parent_id" >
                    <option value="">Select a category</option>
                    @foreach($categories as $parent)
                    <option value="{{$parent->id}}" @if(old('parent_id',isset($category) ? $category->parent_id:'') == $parent->id) selected @endif>{{str_repeat('--',$parent->level).' '.$parent->name}}</option>
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