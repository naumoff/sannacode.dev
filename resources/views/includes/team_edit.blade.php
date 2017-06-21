@extends('welcome')

@section('content')
<div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8">
        <h3 class="page-header">{{$teamModel->team_name}} Team Edit Form</h3>
	    <form method="post" action="/team/{{$teamModel->id}}/update">
            {{csrf_field()}}
            <div class="form-group">
                <label for="team-name">Team Name</label>
                <input
                        type="text"
                        class="form-control"
                        id="team-name"
                        name="team_name"
                        value="{{$teamModel->team_name}}" >
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a role="button"
               href="/teams-edit"
               class="btn btn-info" >
                Cancel
            </a>
        </form>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>


@endsection