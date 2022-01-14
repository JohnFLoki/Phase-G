<?php
   define('DB_SERVER', '///Serveradresse');
   define('DB_USERNAME', '///MySQL Benutzername');
   define('DB_PASSWORD', '///MySQL Passwort');
   define('DB_DATABASE', 'phase_g_acc');
   $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   
  //─────────────────────eingeloggt?─────────────────────
  $usernametest = $_COOKIE["login_user"];
  $sql = "SELECT * FROM accounts WHERE username = '$usernametest'";
  $accresult = mysqli_query($db, $sql);
  $accrow = mysqli_fetch_assoc($accresult);
  $account = mysqli_num_rows($accresult);
  
  //─────────────────────admin?─────────────────────
  $sql = "SELECT * FROM accounts WHERE username = '$usernametest'";
  $adminresult = mysqli_query($db, $sql);
  $adminrow = mysqli_fetch_assoc($adminresult);
  
  $DB_DATABASE2 = "phase_g_words";
  $DB_UNAME = $_COOKIE["login_user"];
  $dbw = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, $DB_DATABASE2);
?>
