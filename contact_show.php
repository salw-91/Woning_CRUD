<?php include 'conn.php'; ?>
<?php include 'include/header.php'; ?>

<div class="container">
    <div class="row">

        <?php
        $id = $_POST['id'];

        $sql_contact = "SELECT * FROM contact WHERE huis_id = $id";
        $result_contact = $conn->query($sql_contact);
        if (!empty($result_contact->num_rows)) {
            // output data of each row
            while ($row = $result_contact->fetch_assoc()) {

                $naam = $row['naam'];
                $telefoon = $row['telefoon'];
                $email = $row['email'];

        ?>
                <div class="card mr-2" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo ucwords($naam) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $telefoon ?></p>
                        </h6>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $email ?></p>
                        </h6>
                        <a href="tel:<?php echo $telefoon ?>" class="card-link"><i class="material-icons" data-toggle="tooltip" title="Call">call</i></a>
                        <a href="mailto:<?php echo $email ?>" class="card-link"><i class="material-icons" data-toggle="tooltip" title="Email">email</i></a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo 'Geen contact gevinde.' . '<br>';
        }
        ?>

    </div>
</div>

<?php include 'include/footer.php'; ?>