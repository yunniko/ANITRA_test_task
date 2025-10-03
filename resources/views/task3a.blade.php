@extends('layouts.app')


@section('title')
    Task 3 (part 1)
@endsection

@section('content')
    <h1>
        Crew of <b>{{ $commanderName }}</b>
    </h1>

    @if(!empty($crew))
        <ul>
            @foreach($crew as $crewMember)
                <li>{{ $crewMember->getName() }}</li>
            @endforeach
        </ul>
    @else
        <div>No crew =(</div>
    @endif
@endsection
