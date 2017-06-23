@extends('includes.crud')

@section('table')

<div class="container-fluid">
    <form method="post" action="/games-edit">
    <div class="row">
        {{csrf_field()}}
        <input type="text" name="secret" value="777" hidden>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="game-date">Date:</label>
                <input type="text"
                       class="form-control"
                       id="game-date"
                       name="game_date"
                       value="<?php echo $gameDate = (session('game_date'))? session('game_date'):null; ?>"
                >
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="owner">owner:</label>
                <input type="text"
                       class="form-control"
                       id="owner"
                       name="owner"
                       value="<?php echo $owner = (session('owner'))? session('owner'):null; ?>"
                >
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="guest">guest:</label>
                <input type="text"
                       class="form-control"
                       id="guest"
                       name="guest"
                       value="<?php echo $guest = (session('guest'))? session('guest'):null; ?>"
                >
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="status">Select list:</label>
                <select class="form-control"
                        id="status"
                        name="status"
                >
                    @foreach($availableStatuses AS $status)
                        <option value = "{{$status}}"
                                <?php if($status == session('status')){
                                	echo "selected";
                                } ?>
                        >
                            {{$status}}
                        </option>
                    @endforeach
                        <option value = ""
                                <?php
                                    if(session('status')==null){
                                    	echo "selected";
                                    } ?>
                        >empty</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <button type="submit" class="btn btn-info btn-xs btn-block">Search</button>
        </div>
        <div class="col-lg-6 col-md-6">
            <a role="button" href="/game/clear-filters" class="btn btn-danger btn-xs btn-block">Clear Filter</a>
        </div>
    </div>
    </form>
</div>


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