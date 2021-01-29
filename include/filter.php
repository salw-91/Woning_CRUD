<div id="filter" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="filter.php" method="POST">
                <input type="hidden" id="id_input_contact" name="huis_id" value="">
                <div class="modal-header">
                    <h4 class="modal-title">Filter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Wijk:</label><br>

                        <?php
                        $sql_wijk = 'SELECT id, wijk FROM wijk';
                        $result_wijk = $conn->query($sql_wijk);
                        if (!empty($result_wijk->num_rows)) {
                            // output data of each row
                            while ($row = $result_wijk->fetch_assoc()) {

                                $wijk_id = $row['id'];
                                $wijk_naam = $row['wijk'];
                        ?>

                                <input type="radio" name="wijk" value="<?php echo $wijk_id; ?>"><?php echo ' ' . ucwords($wijk_naam); ?><br>

                        <?php
                            }
                        } else {
                            echo 'Geen wijk gevinde, invoeg wijk eerste' . '<br>';
                        }
                        ?>

                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Kamers</label>
                        <input type="number" name="kamers" class="form-control" placeholder="1 of meer">
                        <hr>

                    </div>
                    <div class="form-group">
                        <label>Prijs</label>
                        <input type="number" name="prijs_van" class="form-control mb-2" placeholder="Van €">
                        <input type="number" name="prijs_tot" class="form-control" placeholder="Tot €">
                        <hr>

                    </div>
                    <div class="form-group">
                        <label>Status:</label><br>

                        <?php
                        $sql_status = 'SELECT id, `status` FROM `status`';
                        $result_status = $conn->query($sql_status);
                        if (!empty($result_status->num_rows)) {
                        // output data of each row
                        while ($row = $result_status->fetch_assoc()) {

                        $status_id = $row['id'];
                        $status_naam = $row['status'];
                        ?>

                        <input type="radio" name="status" value="<?php echo $status_id; ?>"
                            ><?php echo ' ' . ucwords($status_naam); ?><br>

                        <?php
                        }
                        } else {
                        echo 'Geen status gevinde, invoeg status eerste' . '<br>';
                        }
                        ?>

                    </div>
                </div>

                <script>
                    function huis_contact($id) {
                        document.getElementById('id_input_contact').value = $id;
                    }
                </script>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>