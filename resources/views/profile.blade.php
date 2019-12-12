@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}"></main-header>
@endsection

@section('modal')

@endsection
@section('content')
    <profile v-bind:user="{{$user}}" v-bind:editable="{{$editable}}"></profile>
@endsection
