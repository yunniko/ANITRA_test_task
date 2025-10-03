@extends('layouts.app')


@section('title')
Task 3
@endsection

@section('content')
    <ul>
        @include('crew', ['commander' => $data->getCommander()])
    </ul>
@endsection

