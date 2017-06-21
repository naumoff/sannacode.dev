@extends('welcome')

@section('content')
<div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8">
        <h3 class="page-header">Game Edit Form</h3>
        <form method="post" action="/game/{{$gameModel->id}}/update">
            {{csrf_field()}}
            <div class="form-group">
                <label for="owner-team">Owner Team</label>
                <select id="owner-team"
                    name="owner_id"
                    class="form-control" >
                    @foreach($allTeams AS $team)
                        @if($team->id == $gameModel->owner_id)
                            <option value="{{$team->id}}" selected>
                                {{$team->team_name}}
                            </option>
                            @continue;
                        @endif
                        <option value="{{$team->id}}">
                            {{$team->team_name}}
                        </option>
                    @endforeach
                </select>
                </div>
            <div class="form-group">
                <label for="guest-team">Guest Team</label>
                <select id="guest-team"
                    name="guest_id"
                    class="form-control" >
                    @foreach($allTeams AS $team)
                        @if($team->id == $gameModel->guest_id)
                            <option value="{{$team->id}}" selected>
                                {{$team->team_name}}
                            </option>
                            @continue;
                        @endif
                        <option value="{{$team->id}}">
                            {{$team->team_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="owner-score">Owner Score</label>
                <input type="number"
                       class="form-control"
                       id="owner-score"
                       placeholder="Enter owner score"
                       min="0"
                       max="20"
                       name="owner_score"
                       value="{{$gameModel->owner_score}}"
                >
            </div>
            <div class="form-group">
                <label for="guest-score">Guest Score</label>
                <input type="number"
                       class="form-control"
                       id="guest-score"
                       placeholder="Enter guest score"
                       min="0"
                       max="20"
                       name="guest_score"
                       value="{{$gameModel->guest_score}}"
                >
            </div>
            <div class="form-group">
                <label for="game-date">Date</label>
                <input type="text"
                       class="form-control"
                       id="game-date"
                       name="game_date"
                       value="{{$gameModel->game_date}}"
                       placeholder="Enter game date"
                       required
                >
            </div>
            <div class="form-group">
                <label for="game-status">Game Status</label>
                <select id="game-status"
                    name="status"
                    class="form-control" >
                    @foreach($gameStatuses AS $status)
                        @if($status == $gameModel->status)
                            <option value="{{$status}}" selected required>
                                {{$status}}
                            </option>
                            @continue
                        @endif
                        <option value="{{$status}}" required>
                            {{$status}}
                        </option>
                    @endforeach
                </select>
                </div>
            <button type="submit" class="btn btn-success">
                Update
            </button>
            <a role="button" class="btn btn-info" href="/games-edit">
                Cancell
            </a>
        </form>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>

<script>
    $(document).ready(function(){
        $("#game-date").datepicker({
            dateFormat:"yy-mm-dd"
        });
    });
</script>

@endsection


