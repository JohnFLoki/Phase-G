<?php
   define('DB_SERVER', '///');
   define('DB_USERNAME', '///');
   define('DB_PASSWORD', '///');
   define('DB_DATABASE', 'phase_g_acc');
   $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   
  //─────────────────────eingeloggt?─────────────────────
  $usernametest = $_SESSION["login_user"];
  $sql = "SELECT * FROM accounts WHERE username = '$usernametest'";
  $accresult = mysqli_query($db, $sql);
  $acccount = mysqli_num_rows($accresult);
   
  $DB_DATABASE2 = "phase_g_";
  $DB_DATABASE2 .= $_SESSION["login_user"];
  $dbw = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, $DB_DATABASE2);
?>
