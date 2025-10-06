@if ($commander != null)
    <li>
        {{$commander->getName()}}
        <a href="/tasks/3/crew?commander={{ $commander->getName() }}">
            (crew)
        </a>
        <a href="/tasks/3/virus?commander={{ $commander->getName() }}">
            (virus)
        </a>
        @if (!empty($commander->getTeam()))
            <ul>
                @foreach($commander->getTeam() as $crewMember)
                    @include('crew', ['commander' => $crewMember])
                @endforeach
            </ul>
        @endif
    </li>
@endif
