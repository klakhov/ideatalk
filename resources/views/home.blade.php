@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}"></main-header>
@endsection

@section('meta')
    <meta-bar></meta-bar>
@endsection
@section('modal')

@endsection
@section('content')
    <home></home>
@endsection
