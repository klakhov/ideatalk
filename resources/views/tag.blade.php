@extends('layouts.app')
@section('header')
    <main-header v-bind:user="{{Auth::user()}}"></main-header>
@endsection

@section('modal')
@endsection

@section('content')
    <tag-pallet :tag="{{$tag}}"></tag-pallet>
@endsection
@section('footer')
    <idea-footer></idea-footer>
@endsection
