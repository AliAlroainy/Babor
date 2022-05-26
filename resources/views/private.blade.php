@extends('layouts.app')
@extends('partials.chatmaster')
@section('body')
@section('content')

        <private-chat :user="{{auth()->user()}}"></private-chat>

@endsection

