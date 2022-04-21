@extends('admin.layouts.master')
@section('content')
    user dashboard-index

    <a href="{{ route('change-password-user') }}">change-password</a>
    <ul>
        <li><a href="{{ route('user.profile') }}">profile</a></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
@stop
