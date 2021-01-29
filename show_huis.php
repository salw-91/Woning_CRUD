<?php include 'conn.php'; ?>
<?php include 'include/header.php'; ?>


<?php
$id = $_POST['id_show'];

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

                        <div id="show">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Show Huis</h4>
                                            <a href="index.php" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Adres: <?php echo $adres ?></label>
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Wijk:<?php echo ' ' . ucwords($wijk); ?></label>
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Kamers: <?php echo $kamers ?></label>
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Oppervlakten en inhoud</label><br>
                                            <p class="small_input">Breedte: <?php echo $breedte ?> </p>
                                            <p class="small_input">Hoogte: <?php echo $hoogte ?> </p>
                                            <p class="small_input">Diepte: <?php echo $diepte ?></p>
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Prijs: €<?php echo $prijs ?></label>
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Status: <?php echo ucwords($status) ?> </label><br>
                                        </div>
                                    </div>
                                    <script>
                                        function huis_show($id) {
                                            document.getElementById('id_input_update').value = $id;
                                        }
                                    </script>
                                    <div class="modal-footer">
                                        <a href="index.php" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                    </div>

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