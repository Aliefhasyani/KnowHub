@extends('layout.layout')
@section('content')
<h1>THIS IS THE HOMEPAGE</h1>
@if(Auth::user())
<div><a href="/logout" class="btn btn-sm btn-danger">Logout </a></div>
@endif
@endsection