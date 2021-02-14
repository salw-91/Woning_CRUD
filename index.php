<?php include 'conn.php'; ?>
<?php include 'include/header.php'; ?>



            <?php
            $sql = 'SELECT * FROM huis LEFT JOIN (`status`, wijk) ON (`status`.id = huis.status_id AND
            wijk.id =
            huis.wijk_id)';
            $result = $conn->query($sql);
            if (!empty($result->num_rows)) {
                // output data of each row ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Adres</th>
                        <th>Wijk</th>
                        <th>Kamers</th>
                        <th>Prijs</th>
                        <th>Status</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
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

                        <td><?php echo ($id); ?></td>
                        <td><?php echo (ucwords($adres)); ?></td>
                        <td><?php echo (ucwords($wijk)); ?></td>
                        <td><?php echo ($kamers); ?></td>
                        <td><?php echo ($prijs); ?></td>
                        <td><?php echo (ucwords($status)); ?></td>
                        <td class="text-center">
                            <a href="#contact_show" onclick="contact_show(<?php echo $id ?>)" class="show" data-toggle="modal"><i class="material-icons"
                                data-toggle="tooltip" title="Show">remove_red_eye</i></a>    
                        </td>
                        <td class="text-center">
                            <a href="#contact" onclick="huis_contact(<?php echo $id ?>)" class="contact" data-toggle="modal"><i class="material-icons"
                                    data-toggle="tooltip" title="Contact">contacts</i></a>
                            <a href="#show" onclick="show_huis(<?php echo $id ?>)" class="show" data-toggle="modal"><i class="material-icons"
                                    data-toggle="tooltip" title="Show">remove_red_eye</i></a>
                            <a href="#update" onclick="update_huis(<?php echo $id ?>)" class="edit" data-toggle="modal"><i class="material-icons"
                                    data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#delete" onclick="huis(<?php echo $id ?>)" onclick="var id = <?php echo $id ?>" class="delete" data-toggle="modal"><i
                                    class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php } }
                     else {?>
                        <h4 class="text-center"><?php echo strtoupper("Er is geen huis gevonden!!!")?></h4>
                        <div class="d-flex justify-content-center">
                            <a href="#add" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New Huis</span></a>
                        </div>
                    <?php }?>
                        </div>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
  function show() {
    echo 'I just ran a php function';
  }

  if (isset($_GET['show'])) {
    show();
  }
?>

<!-- Edit Modal HTML -->
<div id="show" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="form_show" action="show_huis.php" method="POST">
                <input type="hidden" id="id_input_show" name="id_show" value="">
            </form>
                    <script>
                        function show_huis($id) {
                            document.getElementById('id_input_show').value = $id;
                            document.getElementById("form_show").submit();
                        }
                    </script>
        </div>
    </div>
</div>

<!-- Contact Modal HTML -->
<div id="contact" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="contact_logica.php" method="POST">
                <input type="hidden" id="id_input_contact" name="huis_id" value="">
                <div class="modal-header">
                    <h4 class="modal-title">Contact Opnamen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Naam</label>
                        <input type="text" name="naam" placeholder="Salwan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Telefoon Nummer</label>
                        <input type="text" name="telefoon" placeholder="06..." class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="user@user.com" class="form-control" required>
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

<!-- Show Contact Modal HTML -->
<div id="contact_show" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="form_contact_show" action="contact_show.php" method="POST">
                <input type="hidden" id="id_input_contact_show" name="id" value="">
            </form>
                    <script>
                        function contact_show($id) {
                            document.getElementById('id_input_contact_show').value = $id;
                            document.getElementById("form_contact_show").submit();
                        }
                    </script>
        </div>
    </div>
</div>


<!-- Edit Modal HTML -->
<div id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="form_update" action="huis_update.php" method="POST">
                <input type="hidden" id="id_input_update" name="id" value="">
            </form>
                    <script>
                        function update_huis($id) {
                            document.getElementById('id_input_update').value = $id;
                            document.getElementById("form_update").submit();
                        }
                    </script>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>