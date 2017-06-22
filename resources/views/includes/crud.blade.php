@extends('welcome')

@section('content')
<div class="row">
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-2 col-md-2">
        <h4 class="text-center">Add Menu</h4>
    </div>
    <div class="col-lg-8 col-md-8">
        <h4 class="text-center">Edit Views</h4>
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>
<div class="row">
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-2 col-md-2">
        <br>
        <br>
        <div class="btn-group-vertical center-block">
            <button id="add-team" type="button" class="btn btn-primary">
                Add New Team
            </button>
            <button id="add-game" type="button" class="btn btn-primary">
                Add New Game
            </button>
        </div>
    </div>
    <div class="col-lg-8 col-md-8">
        <ul class="nav nav-pills">
            <li><a id="team-edit" href="/teams-edit">Teams Edit View</a></li>
            <li><a id="game-edit" href="/games-edit">Games Edit View</a></li>
        </ul>
        <div id="edit-data">
            @yield('table')
        </div>
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>

    @include('_partials.add_new_team_modal')
    @include('_partials.add_new_game_modal')

@endsection