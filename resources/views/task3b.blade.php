@extends('layouts.app')


@section('title')
    Task 3 (part 2)
@endsection

@section('content')
    @if (!empty($infection))
        <h1>
            Virus spreading from <b>{{ $infection[0][0]->getName() }}</b>
        </h1>

        <ul>
            @foreach($infection as $gen => $crewMembers)
                <li>{{ $gen }} - {{ implode(', ', $crewMembers) }}</li>
            @endforeach
        </ul>
    @endif

@endsection
