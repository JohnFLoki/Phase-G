<?php
//─────────────────────HTML─────────────────────
echo '
<html>
<head>
  <title>Einstellungen</title>
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="viewport" content="width=700px, user-scalable=no">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
';
  include './database.php';
  if($account == 1){
    if ($adminrow['id'] == 1) {
        echo '
        <div id="dmenuM" class="dnav">
        <img src="back.svg" alt="Zurück" class="dback" height="18px">
          <b>&nbsp;&nbsp;Hallo ' . $_COOKIE["login_user"] . '! <img src="settings.svg" alt="Settings" height="18px" onclick="location.href=\'./settings.php\'" style="cursor: pointer;"><br>
          <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b>
        <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="dgitM" target="_blank">Github (Funktion, Lizenz, ...)</a>
        </div>
          <!---─────────────────────Handy─────────────────────--->
          <div id="sidebar">
            <div id="menuM" class="nav">
              <b>&nbsp;&nbsp;Hallo ' . $_COOKIE["login_user"] . '! <img src="settings.svg" alt="Settings" height="26px" onclick="location.href=\'./settings.php\'" style="cursor: pointer;"><br>
              <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><a href=""></a>
              <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="gitM" target="_blank">Github (Funktion, Lizenz, ...)</a>
            </div>
            <span class="open" id="button">
              <button class="currentclose" onClick="toggleMenu(this)" id="buttoninner">
                ☰
              </button>
            </span>
          </div>
        <script>
          function toggleMenu(button) { 
            if ( button.className === "currentclose" ) {
              document.getElementById("menuM").style.marginRight = "0px";
              document.getElementById("buttoninner").style.right = "280px";
              document.getElementById("one").style.left = "-250px";
              button.className = "";
            } else {
              document.getElementById("menuM").style.marginRight = "-250px";
              document.getElementById("buttoninner").style.right = "30px";
              document.getElementById("one").style.left = "0px";
              button.className = "currentclose";
            }
          }
        </script>
        ';
        $error = "";
        $fail = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if ($_POST['dict'] != "berlin1" && $_POST['dict'] != "demo1") {
            $error = $error . "Das ausgewählte Wörterbuch ist nicht verfügbar!<br>";
            $fail = 1;
          }

          $newusername =  htmlspecialchars($_POST['newusername']);
          $sql = "SELECT * FROM accounts WHERE username = '$newusername'";
          $accexist = mysqli_query($db, $sql);
          $accexistcount = mysqli_num_rows($accexist);
          if ($accexistcount >= 1) {
            $error = $error . "Der Benutzer mit diesem Namen existiert schon!<br>";
            $fail = 1;
          }

          if($_POST['newuserpass'] != $_POST['renewuserpass']){
            $error = $error . "Die Passwörter stimmen nicht überein!<br>";
            $fail = 1;
          }

          if ($fail == 0) {
            //─────────────────────neuer Benutzer─────────────────────
            $newuserpass =  htmlspecialchars($_POST['newuserpass']);
            $sql = "INSERT INTO `accounts` (`id`, `username`, `password`, `backwards`, `github`, `playback`) VALUES (NULL, '$newusername', '$newuserpass', '0', 'on', '1')";
            mysqli_query($db, $sql);
            $error = $error . "Benutzer erfolgreicht erstellt!<br>";

            //─────────────────────neue Tabelle─────────────────────
            $sql = "CREATE TABLE `words_$newusername` (
                `id` int(11) NOT NULL,
                `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `date` int(11) NOT NULL DEFAULT 0,
                `level` int(11) NOT NULL DEFAULT 0,
                `backdate` int(11) NOT NULL DEFAULT 0,
                `backlevel` int(11) NOT NULL DEFAULT 0
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            mysqli_query($dbw, $sql);
            $error = $error . "Tabelle erfolgreicht erstellt!<br>";

            //─────────────────────neue Karteikarten─────────────────────
            $query = 'INSERT INTO `words_' . $newusername  . '` (`id`, `link`, `name`, `date`, `level`, `backdate`, `backlevel`) VALUES ';
            if($_POST['dict'] == "berlin1"){
              $sqlScript = file('https://raw.githubusercontent.com/JohnFCreep/Phase-G/main/sql-berlin1.sql');
            }
            if($_POST['dict'] == "demo1"){
              $sqlScript = file('https://raw.githubusercontent.com/JohnFCreep/Phase-G/main/sql-demo1.sql');
            }
            foreach ($sqlScript as $line)	{

              $startWith = substr(trim($line), 0 ,2);
              $endWith = substr(trim($line), -1 ,1);

              if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
              }
            		
              $query = $query . $line;
              if ($endWith == ';') {
                mysqli_query($dbw,$query);
                $query= '';		
              }
            }
            $error = $error . "Karteikarten erfolgreicht erstellt!<br>";
          }
        }
  //─────────────────────HTML─────────────────────
  echo '
  <div class="one" id="one"><div class="two"><div class="settingslogin">
    <img src="back1.svg" alt="Zurück" onclick="location.href=\'./admin.php\'" class="settingsback"><br>
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
      <p>Wörterbuch auswählen:</p>
      <label style="width: 100%; height:10px;"></label>
      <input type="radio" id="berlin1" name="dict" value="berlin1" required>
      <label for="berlin1">Berliner Dialekt (gebaerdenlernen.de)</label><br>
      <label style="width: 100%; height:10px;"></label>
      <input type="radio" id="demo1" name="dict" value="demo1" required>
      <label for="demo1">Demo (abc von gebaerdenlernen.de)</label><br>
      ';
      //<label style="width: 100%; height:10px;"></label>
      //<input type="radio" id="placeholder1" name="dict" value="placeholder1" required>
      //<label for="placeholder1">Placeholder1</label><br>
      echo '
      <label style="width: 100%; height:40px;"></label>
      <input class="settingspass" type="text" name="newusername" placeholder="Benutzername" required /><br><br>
      <input class="settingspass" type="password" name="newuserpass" placeholder="Passwort" required /><br><br>
      <input type="password" name="renewuserpass" placeholder="Passwort wiederholen" required /><br>
      ';
      echo $error;
      echo '
      <br><br>
      <input type="submit" name="login" value="Speichern" />
    </form>
  </div></div></div>
  ';
    } else {
        echo '
        <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding: 70px 20px;"><a href="./index.php" style="color: #b7c7e2">Du besitzt nicht die Zugriffsrechte zu dieser Seite.<br>Bitte logge dich mit der Admin Account ein!</a></p></div></div></div>
        ';
    }
    
    
  }else {
    echo '
    <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding: 70px 20px;"><a href="./index.php" style="color: #b7c7e2">Bitte logge dich erst hier ein!</a></p></div></div></div>
    ';
  }
?>