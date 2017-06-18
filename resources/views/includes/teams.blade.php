@extends('welcome')

@section('content')
    <div class="col-lg-2 col-md-2">
    </div>
    <div class="col-lg-8 col-md-8">
        <h3>Team list</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Football Teams List</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams AS $key=>$team)
                    <tr>
                        <td>
                           {{$team->team_name}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-2 col-md-2">
    </div>
@endsection