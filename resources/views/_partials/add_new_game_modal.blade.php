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
                <form role="form">
                    <div class="form-group">
                        <label for="usrname">Owner Team</label>
                    </div>
                    <div class="form-group">
                        <label for="psw">Guest Team</label>
                    </div>
                    <div class="form-group">
                        <label for="psw">Owner Score</label>
                        <input type="text" class="form-control" id="psw" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="psw">Guest Score</label>
                        <input type="text" class="form-control" id="psw" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="psw">Date</label>
                        <input type="text" class="form-control" id="psw" placeholder="Enter password">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Login</button>
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
            alert("add new game!");
            $("#add-game-modal").modal();
        });
    });
</script>