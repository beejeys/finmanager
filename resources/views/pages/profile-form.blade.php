@extends('layouts.app')

@section('content')
<h1>My Profile</h1>
<form action="" method="POST">
    @csrf
    <table cellpadding="10" cellspacing="0" border="1">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="{{old('name',isset($user) ? $user->name:'')}}" required /></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" value="{{old('email',isset($user) ? $user->email:'')}}" required /></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="password" value="" /></td>
        </tr>
        <tr>
            <th>Confirm Password</th>
            <td><input type="password" name="confirm_password" value="" /></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td><input type="submit" value="Submit" /></td>
        </tr>
        
    </table>
</form>
@endsection