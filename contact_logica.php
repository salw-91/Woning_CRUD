<?php include "conn.php" ?>
<?php include "include/header.php" ?>

<?php 

$huis_id = $_POST['huis_id'];
$naam = $_POST['naam'];
$telefoon = $_POST['telefoon'];
$email = $_POST['email'];

$sql = "INSERT INTO contact (huis_id, naam, telefoon, email)
VALUES ($huis_id, '$naam', $telefoon, '$email')";

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