<!-- Modal -->
<div class="modal fade" id="add-game-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>
                    <span class="glyphicon glyphicon-lock"></span>
                    Add New Game
                </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" method="post" action="/add-game">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="owner-team">Owner Team</label>
                        <select id="owner-team"
                                name="owner_id"
                                class="form-control" >
                            @foreach($data AS $team)
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
                            @foreach($data AS $team)
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
                               name="guest_score" >
                    </div>
                    <div class="form-group">
                        <label for="game-date">Date</label>
                        <input type="text"
                               class="form-control"
                               id="game-date"
                               name="game_date"
                               placeholder="Enter game date">
                    </div>
                    <div class="form-group">
                        <label for="game-status">Game Status</label>
                        <select id="game-status"
                                name="status"
                                class="form-control" >
                            @foreach($statuses AS $status)
                                <option value="{{$status}}">
                                    {{$status}}
                                </option>
                             @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">
                        Add New Game
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){
        $("#add-game").click(function(){
            $("#add-game-modal").modal();
        });
        $("#game-date").datepicker({});
    });
</script>