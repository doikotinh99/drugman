@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('maincontent')
    @foreach ($pages as $item)
        @include($item)
    @endforeach
@endsection
