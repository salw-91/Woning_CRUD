<?php include "conn.php" ?>
<?php include "include/header.php" ?>

<?php 

$status = $_POST['status'];

$sql = "INSERT INTO status (status)
VALUES ('$status')";

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
