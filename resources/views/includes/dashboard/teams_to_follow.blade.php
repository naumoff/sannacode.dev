@extends('home')

@section('table')

<?php $hideLogMessage = true; ?>

@if(!empty($teams))
<div class="page-header">
    <h2 class="text-center">Team list to follow</h2>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Team Name</th>
            <th style="text-align:left">Teams to Follow</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams AS $key=>$team)
        <tr>
            <td>{{$team->team_name}}</td>
            <td>
                <form class= "follow">
                    {{csrf_field()}}
                    <div class="form-group" style="text-align: left; padding-left: 25px">
                        <label class="checkbox">
                            <input type="checkbox"
                                   name="team-id"
                                   value="{{$team->id}}"
                                   @if(count($team->users))
                                       checked
                                   @endif
                            >
                            follow team
                        </label>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $teams->links() }}

<script>
    $(document).ready(function(){
        $(".follow :checkbox").change(function(){
            var teamID = $(this).val();
            if(this.checked){
                $.post
                (
                    '/home/follow-team',
                    {
                        'teamID':teamID,
                        "_token": "{{ csrf_token() }}"
                    },
                    function(data)
                    {
                        if(data){
                            alert("you started to follow team "+data);
                            teamsFollowQty = teamsFollowQty + 1;
                        }
                    }
                );
            }else{
                $.post
                (
                    '/home/stop-follow-team',
                    {
                        'teamID':teamID,
                        "_token": "{{ csrf_token() }}"
                    },
                    function(data)
                    {
                        if(data){
                            alert("you stopped following team "+data);
                        }
                    }
                );
            }
        })
    })
</script>
@endif

@endsection