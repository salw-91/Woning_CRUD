<?php include "conn.php" ?>
<?php include "include/header.php" ?>

<?php 

$adres = $_POST['adres'];
$wijk = $_POST['wijk'];
$kamers = $_POST['kamers'];
$breedte = $_POST['breedte'];
$hoogte = $_POST['hoogte'];
$diepte = $_POST['diepte'];
$status = $_POST['status'];
$prijs = $_POST['prijs'];
$vandaag= date("Y-m-d", strtotime("today"));  


$sql = "INSERT INTO huis (adres, wijk_id, kamers, breedte, hoogte, diepte, status_id, prijs)
VALUES ('$adres', $wijk, $kamers, $breedte, $hoogte, $diepte, $status, $prijs)";


if ($conn->query($sql) === TRUE) {
  ?>
 <script> location.replace("index.php"); </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>

<?php include "include/footer.php" ?>