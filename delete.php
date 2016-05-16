<?php
include "config.php";
if(isset($_GET['d'])):
     $stmt = $mysqli->prepare("DELETE FROM personal WHERE id_personal=?");
     $stmt->bind_param('s', $id);

     $id = $_GET['d'];

     if($stmt->execute()):
          echo "<script>location.href='index.php'</script>";
     else:
          echo "<script>alert('".$stmt->error."')</script>";
     endif;
endif;
?>
