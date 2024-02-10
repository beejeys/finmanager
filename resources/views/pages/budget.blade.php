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
            <option value="{{$i}}"  @if(request()->month==$i) selected @endif>{{date('F',strtotime('1977-'.$i.'-01'))}}</option>
            @endfor
        </select>
        <select name="year">
            @for($i=2020;$i<=date('Y')+1;$i++)
            <option value="{{$i}}" @if(request()->year==$i) selected @endif>{{$i}}</option>
            @endfor
        </select>
        <input type="submit" value="Submit" />
    </p>
</form>

<form action="" method="POST" >
    @csrf
    <input type="hidden" name="month" value="{{old('month',isset($month) ? $month:date('n'))}}" />
    <input type="hidden" name="year" value="{{old('year',isset($year) ? $year:date('Y'))}}" />

@if(isset($income) && count($income))

<h3>Income categories</h3>

<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Budget</th>
    </tr>
    @foreach($income as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{!!str_repeat(' &nbsp;- ',$category->level). $category->name!!}</td>
        <td align="right"><input type="text" name="categories[{{$category->id}}]" value="{{old('',isset($budget) && $budget->where('category_id',$category->id)->first() ? $budget->where('category_id',$category->id)->first()->amount:0)}}" /></td>
    </tr>
    @endforeach
</table>
@else
<p>No category found.</p>

@endif

@if(isset($expense) && count($expense))

<h3>Expense categories</h3>

<table cellpadding="10" cellspacing="0" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Budget</th>
    </tr>
    @foreach($expense as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{!!str_repeat(' &nbsp;- ',$category->level). $category->name!!}</td>
        <td align="right"><input type="text" name="categories[{{$category->id}}]"  value="{{old('',isset($budget) && $budget->where('category_id',$category->id)->first() ? $budget->where('category_id',$category->id)->first()->amount:0)}}"  /></td>
    </tr>
    @endforeach
</table>
@else
<p>No category found.</p>

@endif

<p>
    <input type="submit" name="submit" value="Submit" />
</p>
</form>
@endsection