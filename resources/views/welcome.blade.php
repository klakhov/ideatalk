@extends('layouts.app')
@section('welcome')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col welcome-big-greeting text-center">Get the greatest ideas for your projects</div>
        </div>
        <div class="row">
            <div class="col welcome-small-greeting text-center">
                Tired of looking for new ideas? Look here.
            </div>
        </div>
        <div class="row justify-content-center">
            <button class="button-primary col-3">
                Lets begin
            </button>
        </div>
        <div class="row justify-content-center">
            <div class="col welcome-announcement text-center">
                Already have an account? <a href="">Sign in.</a>
            </div>
        </div>
        <div class="row welcome-panel justify-content-center">
            <div class="col-md-6 col-xl-4 row welcome-panel-bindings justify-content-center">
                <img src="{{asset('img/check-mark.png')}}" alt="" height="35" width="35">
                <div class="welcome-panel-text">Great ideas</div>
            </div>
            <div class="col-md-6 col-xl-4 row welcome-panel-bindings justify-content-center">
                <img src="{{asset('img/check-mark.png')}}" alt="" height="35" width="35">
                <div class="welcome-panel-text">Creative process</div>
            </div>
            <div class="col-xl-4 row welcome-panel-bindings justify-content-center">
                <img src="{{asset('img/check-mark.png')}}" alt="" height="35" width="35">
                <div class="welcome-panel-text">You will love it</div>
            </div>
        </div>
    </div>

@endsection
