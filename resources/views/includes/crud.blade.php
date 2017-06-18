@extends('welcome')

@section('content')
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-2 col-md-2">
            <h4 class="text-center">Add Menu</h4>
        </div>
        <div class="col-lg-6 col-md-6">
            <h4 class="text-center">Edit Views</h4>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
    <div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-2 col-md-2">
        <div class="btn-group-vertical center-block">
            <button id="add-team" type="button" class="btn btn-primary">
                Add New Team
            </button>
            <button id="add-game" type="button" class="btn btn-primary">
                Add New Game
            </button>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <ul class="nav nav-pills">
            <li><a href="#">Teams Edit View</a></li>
            <li><a href="#">Games Edit View</a></li>
        </ul>
    </div>
    <div class="col-lg-2 col-md-2"></div>
    </div>

    @include('_partials.add_new_team_modal')
    @include('_partials.add_new_game_modal')

@endsection