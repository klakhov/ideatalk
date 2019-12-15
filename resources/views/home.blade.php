@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}" v-bind:is-new-article="false"></main-header>
@endsection

@section('meta')
    <meta-bar></meta-bar>
@endsection
@section('modal')

@endsection
@section('content')
    <home></home>
@endsection
