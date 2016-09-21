@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    @include('layout.latest')
    @include('layout.video')
    @include('layout.movies')
    @include('layout.news')
@endsection
