@extends('welcome')

@section('content')
    <div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8">
        <h3 class="text-center page-header">Play List</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Date</th>
                    <th>Owner</th>
                    <th>Guest</th>
                    <th>Owner Score</th>
                    <th>Guest Score</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($playlist AS $key=>$game)
                    <tr>
                        <td>
                            {{$game->game_date}}
                        </td>
                        <td>
                            {{$game->ownerTeam->team_name}}
                        </td>
                        <td>
                            {{$game->guestTeam->team_name}}
                        </td>
                        <td>
                            {{$game->owner_score}}
                        </td>
                        <td>
                            {{$game->guest_score}}
                        </td>
                        <td>
                            {{$game->status}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $playlist->links() }}
    </div>
    <div class="col-lg-2 col-md-2"></div>
    </div>
@endsection