@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="text-center" style="width:400px; margin:0 auto;">
                <img src="{{asset('imgs/logo.png')}}" style="max-width: 70%; margin-top: 50px; margin-bottom: 50px;" alt="logo">
                <h1>{{ config('app.name', 'Laravel') }}</h1>
            </div>
        </div>
    </div>
@endsection