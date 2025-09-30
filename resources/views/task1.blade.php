@extends('layouts.app')


@section('title')
Task 1
@endsection

<?php $data->useBootstrapFour(); ?>
@section('content')
    <a href="/tasks/update/1">GENERATE NEW SET</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Integer</th>
            <th scope="col">Count of duplicates</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($data->items() as $integer => $duplicatesCount)
                <tr>
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
@endsection

@section('comment')
    <p>First I tried to use normal PHP arrays (using integer as the key and amount of entries as the value),
        but I was not happy about performance, so I decided to look for more specialized data types.
        Though using them improved memory usage a little bit, but did not improve timings.</p>
    <p>Also I decided to use pagination because the amount of
        duplicates is huge and browser is not happy about it</p>
    <p>To use pagination I had to store the result somewhere and cache was the first idea.
    I store it "forever". The data is the same for all visitors. So is the update. That is far from
    good solution, but for test task with limited users it should be enough</p>
@endsection
