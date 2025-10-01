@extends('layouts.app')


@section('title')
Task 1
@endsection

<?php $data->useBootstrapFour(); ?>
@section('content')
    <div>
        <a href="/tasks/update/1">GENERATE NEW SET</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Integer</th>
                <th scope="col">Count of duplicates</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data->items() as $integer => $duplicatesCount)
                <tr @if($duplicatesCount > 2) class="table-secondary" @endif>
                    <td>{{ $integer }}</td>
                    <td>{{ $duplicatesCount }}</td>
                </tr>
            @empty
                <tr>
                    <td>No duplicates</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $data->links() }}
    </div>

@endsection

@section('comment')
    <p>First I tried to use normal PHP arrays (using integer as the key and amount of entries as the value),
        but I was not happy about performance, so I decided to look for more specialized data types.
        Though using them improved memory usage a little bit, but did not improve timings.</p>
    <p>Also I decided to use pagination because the amount of
        duplicates is huge and browser was not happy about it</p>
    <p>The better solution would be to use queries and chunk by chunk process the information on background
    </p>
@endsection
