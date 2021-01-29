<div id="addwijk" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="wijk_invoegen_logica.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Wijk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Wijk Naam</label>
                        <input type="text" name="wijk" class="form-control" required>
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