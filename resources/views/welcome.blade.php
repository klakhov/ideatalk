@extends('layouts.app')
@section('header')
    <welcome-header></welcome-header>
@endsection

@section('modal')
    <login-modal></login-modal>
    <register-modal></register-modal>
@endsection
@section('content')
    <welcome></welcome>
@endsection
