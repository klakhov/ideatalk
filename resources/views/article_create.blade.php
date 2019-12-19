@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}" v-bind:is-new-article="true"></main-header>
@endsection

@section('modal')
@endsection

@section('content')
    <new-article></new-article>
@endsection
