<?php
 $codigo = $_POST['id'];
  // do some validation here to ensure id is safe

  $link =  mysqli_connect("parra.chillan.ubiobio.cl","remferna","TbHpo54sQSSS","remferna");
  $sql = "SELECT srcIMG FROM plato WHERE id_plato=$codigo";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($link);

  header("Content-type: image/jpeg");
  echo $row['srcIMG'];
?>