@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-pills nav-justified">
                <li class="active">
                    <a href="/home/teams">
                        All Teams -
                        <span class="badge">{{$teamsQty}}</span>
                    </a>
                </li>
                <li>
                    <a href="home/following">
                        Teams I follow -
                        <span class="badge">{{$teamsFollowQty}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">

        </div>
    </div>
</div>
@endsection
