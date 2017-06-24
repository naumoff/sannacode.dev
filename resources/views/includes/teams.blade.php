@extends('welcome')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
        <h3 class="text-center page-header">Team list</h3>
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
        {{ $teams->links() }}
    </div>
</div>
@endsection