@extends('layouts.app')


@section('title')
    Page not found
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <a href="/"><img src="{{ asset('images/404.png') }}" alt="Logo"></a>
    </div>
@endsection


