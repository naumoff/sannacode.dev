<!-- Modal -->
<div class="modal fade" id="add-team-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>
                    <span class="glyphicon glyphicon-lock"></span>
                    Add New Team
                </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" method="post" action="/add-team">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="teamname">Team Name</label>
                        <input type="text"
                               class="form-control"
                               id="teamname"
                               name="team_name"
                               placeholder="Enter New Team Name"
                               required >
                    </div>
                    <button type="submit" class="btn btn-success btn-block">
                        Add New Team
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){
        $("#add-team").click(function(){
            $("#add-team-modal").modal();
        });
    });
</script>