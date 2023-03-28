@extends('layouts.ajax')
@section('maincontent')
    @foreach ($pages as $item)
        @include($item)
    @endforeach
@endsection