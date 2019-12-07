@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}"></main-header>
@endsection

@section('modal')

@endsection
@section('content')
    <home></home>
@endsection
