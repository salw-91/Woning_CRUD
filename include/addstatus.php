<div id="addStatus" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="Status_invoegen_logica.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status Naam</label>
                        <input type="text" name="status" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>