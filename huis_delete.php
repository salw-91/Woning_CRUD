<?php include "conn.php" ?>
<?php include "include/header.php" ?>

<?php
$id = $_POST['id_delete'];
$sql = "DELETE FROM huis where id_huis = $id";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  ?>
 <script> location.replace("index.php"); </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<?php include "include/footer.php" ?>