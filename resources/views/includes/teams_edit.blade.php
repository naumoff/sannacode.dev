@extends('includes.crud')

@section('table')
<form action="/teams-edit">
    {{csrf_field()}}
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Team Name</th>
            <th>Edit Team</th>
            <th>Delete Team</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams AS $key=>$team)
            <tr>
                <td>{{$team->team_name}}</td>
                <td>
                    <a href="team/{{$team->id}}/edit" class="btn btn-info btn-xs" role="button">
                        Edit Team
                    </a>
                </td>
                <td>
                    <a href="team/{{$team->id}}/delete" class="btn btn-danger btn-xs" role="button">
                        Delete Team
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $teams->links() }}
@endsection