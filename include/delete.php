<!-- Delete Modal HTML -->
<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form" action="huis_delete.php" method="POST">
                <input type="hidden" id="id_input" name="id_delete" value="">
                <div class="modal-header">
                    <h4 class="modal-title">Huis Verwijderen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Weet u zeker dat u dit huis wilt verwijderen?</p>
                    <p class="text-warning"><small>Deze actie kan niet ongedaan gemaakt worden.</small></p>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id">
                    <script>
                        function huis($id) {
                            document.getElementById('id_input').value = $id;
                        }
                        </script>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>