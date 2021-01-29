<?php include 'conn.php'; ?>
<?php include 'include/header.php'; ?>


<?php
$id = $_POST['id'];

$sql_show = "SELECT * FROM huis LEFT JOIN (`status`, wijk) ON (`status`.id = huis.status_id AND
            wijk.id =
            huis.wijk_id) WHERE id_huis = $id";
$result = $conn->query($sql_show);
if (!empty($result->num_rows)) {
    // output data of each row 
?>
    <table class="table table-striped table-hover">
        <tbody>
            <div id="huis">
                <tr>
                    <?php while ($row = $result->fetch_assoc()) {
                        // var_dump($row );
                        $id = $row['id_huis'];
                        $adres = $row['adres'];
                        $kamers = $row['kamers'];
                        $breedte = $row['breedte'];
                        $hoogte = $row['hoogte'];
                        $diepte = $row['diepte'];
                        $prijs = $row['prijs'];
                        $wijk = $row['wijk'];
                        $status = $row['status'];
                    ?>

                        <div>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="huis_update_logica.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Huis</h4>
                                        <a href="index.php" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Adres:</label>
                                            <input type="text" name="adres" placeholder="Vijverlaan" class="form-control" value="<?php echo ucwords($adres) ?>" required>

                                            <hr>
                                        </div>
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

                                                    <input type="radio" name="wijk" value="<?php echo $wijk_id; ?>"
                                                    <?php
                                                    if($wijk_naam == $wijk ){ ?>
                                                        checked
                                                   <?php }
                                                    ?>
                                                    required><?php echo ' ' . ucwords($wijk_naam); ?><br>

                                            <?php
                                                }
                                            } else {
                                                echo 'Geen wijk gevinde, invoeg wijk eerste' . '<br>';
                                            }
                                            ?>

                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Kamers:</label>
                                            <input type="number" name="kamers" class="form-control" value="<?php echo $kamers ?>" required>

                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Oppervlakten en inhoud</label><br>
                                            <input type="number" name="breedte" class="small_input form-control" placeholder="Breedte" value="<?php echo $breedte ?>" required>
                                            <input type="number" name="hoogte" class="small_input form-control" placeholder="Hoogte" value="<?php echo $hoogte ?>"  required>
                                            <input type="number" name="diepte" class="small_input form-control" placeholder="Diepte" value="<?php echo $diepte ?>"  required>
                                        </div>
                                    
                                    <div class="form-group">
                                        <label>Prijs:</label>
                                        <input type="number" name="prijs" class="form-control" placeholder="€" value="<?php echo $prijs ?>" required>
                                        <hr>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="lname">Status:</label><br>
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

                                            <?php
                                                    if($status_naam == $status ){ ?>
                                                        checked
                                                   <?php }
                                                    ?>

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
                                        <a href="index.php" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Update">

                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
        <?php }
                } else { ?>
        <h4 class="text-center"><?php echo strtoupper("Er is geen huis gevonden!!!") ?></h4>
        <div class="d-flex justify-content-center">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Huis</span></a>
        </div>
    <?php } ?>
    <?php include 'include/footer.php'; ?>