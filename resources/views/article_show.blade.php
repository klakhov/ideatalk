@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}" v-bind:is-new-article="false"></main-header>
@endsection

@section('modal')
@endsection
@section('content')
    <article-content v-bind:article="{{$article}}" v-bind:is-pointed="'{{$isPointed}}'" v-bind:points-count="{{$points_count}}"></article-content>
@endsection
