@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}" v-bind:is-new-article="false"></main-header>
@endsection

@section('modal')
@endsection

@section('content')
    <bookmark-timeline></bookmark-timeline>
@endsection

@section('footer')
    <idea-footer></idea-footer>
@endsection
