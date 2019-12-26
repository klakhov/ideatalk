@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}" v-bind:is-new-article="false"></main-header>
@endsection

@section('meta')
@endsection
@section('modal')

@endsection
@section('content')
    <featured-timeline v-bind:articles="{{$articles}}"></featured-timeline>
@endsection

@section('footer')
    <idea-footer></idea-footer>
@endsection
