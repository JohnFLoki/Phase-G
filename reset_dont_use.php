<?php
  include './database.php';
  $sql = "UPDATE words_$usernametest SET level='0', backlevel='0', date='0', backdate='0'";
  mysqli_query($dbw, $sql);
  header("location: ./index.php");
 ?>
