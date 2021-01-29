<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="invoegen2.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Huis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Adres</label>
                        <input type="text" name="adres" placeholder="Vijverlaan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Wijk:</label><br>

                        <?php
                        $sql_wijk = 'SELECT id, wijk FROM wijk';
                        $result_wijk = $conn->query($sql_wijk);
                        if (!empty($result_wijk->num_rows)) {
                        // output data of each row
                        while ($row = $result_wijk->fetch_assoc()) {

                        $wijk_id = $row['id'];
                        $wijk_naam = $row['wijk'];
                        ?>

                        <input type="radio" name="wijk" value="<?php echo $wijk_id; ?>"
                            required><?php echo ' ' . ucwords($wijk_naam); ?><br>

                        <?php
                        }
                        } else {
                        echo 'Geen wijk gevinde, invoeg wijk eerste' . '<br>';
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <label>Kamers</label>
                        <input type="number" name="kamers" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Oppervlakten en inhoud</label><br>
                        <input type="number" name="breedte" class="small_input form-control" placeholder="Breedte"
                            required>
                        <input type="number" name="hoogte" class="small_input form-control" placeholder="Hoogte"
                            required>
                        <input type="number" name="diepte" class="small_input form-control" placeholder="Diepte"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Prijs</label>
                        <input type="number" name="prijs" class="form-control" placeholder="€" required>
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
                            required><?php echo ' ' . ucwords($status_naam); ?><br>

                        <?php
                        }
                        } else {
                        echo 'Geen status gevinde, invoeg status eerste' . '<br>';
                        }
                        ?>

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