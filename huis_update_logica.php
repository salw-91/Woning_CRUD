<?php include "conn.php" ?>
<?php include "include/header.php" ?>

<?php 

$id = $_POST['id'];
$adres = $_POST['adres'];
$wijk = $_POST['wijk'];
$kamers = $_POST['kamers'];
$breedte = $_POST['breedte'];
$hoogte = $_POST['hoogte'];
$diepte = $_POST['diepte'];
$status = $_POST['status'];
$prijs = $_POST['prijs'];

$sql = "UPDATE huis SET adres = '$adres', wijk_id = $wijk, kamers = $kamers, breedte = $breedte, hoogte = $hoogte, diepte = $diepte, `status_id` = $status, prijs = $prijs WHERE id_huis= $id";

if (!empty($conn->query($sql))) {
  ?>
 <script> location.replace("index.php"); </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error."<br>";
  echo $id;
}
mysqli_close($conn);

?>

<?php include "include/footer.php" ?>
