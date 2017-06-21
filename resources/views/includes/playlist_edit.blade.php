@extends('includes.crud')

@section('table')
    <table class="table">
        <thead>
        <tr>
            <th>Game Date</th>
            <th>Owner Team</th>
            <th>Guest Team</th>
            <th>Owner Score</th>
            <th>Guest Score</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($playlist AS $key=>$game)
            <tr>
                <td>{{$game->game_date}}</td>
                <td>{{$game->ownerTeam->team_name}}</td>
                <td>{{$game->guestTeam->team_name}}</td>
                <td>{{$game->owner_score}}</td>
                <td>{{$game->guest_score}}</td>
                <td>{{$game->status}}</td>
                <td>
                    <a href="game/{{$game->id}}/edit" class="btn btn-info btn-xs" role="button">
                        Edit Game
                    </a>
                </td>
                <td>
                    <a href="game/{{$game->id}}/delete" class="btn btn-danger btn-xs" role="button">
                        Delete Game
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $playlist->links() }}
@endsection