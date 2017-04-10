@extends('layouts.app')

@section('added_css')
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="block_error">
    <div>
        <h1>404<hr /></h1>
        <p>Oops you've have encountered an error</p>
        <p>It Appears That The Link You Tried To Access Doesn't Exist</p>
        <p>Please Click Below <p class="center"><a class="btn btn-primary brn-flat" href="@if (Auth::user()) '/home' @else '/' @endif">Back To @if (Auth::user()) The Dashboard @else The HomePage @endif</a></p></p>
    </div>
</div>
@endsection