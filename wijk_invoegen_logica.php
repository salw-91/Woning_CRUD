<?php include "conn.php" ?>
<?php include "include/header.php" ?>

<?php 

$wijk = $_POST['wijk'];

$sql = "INSERT INTO wijk (wijk)
VALUES ('$wijk')";

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
<?php echo header("Location: Huizen.php"); ?>