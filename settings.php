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
    
    //─────────────────────Account-PC─────────────────────
  
    //─────────────────────HTML─────────────────────
    echo '
    <!---─────────────────────Stats─────────────────────--->
    <!---─────────────────────Sidebar-PC─────────────────────--->
    <div id="dmenuM" class="dNav">
    <img src="back.svg" alt="Zurück" class="dback" height="18px">
      <b>&nbsp;&nbsp;Hallo ' . $_COOKIE["login_user"] . '!<br>
      <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b>
    <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="dGit" target="_blank">Github (Funktion, Lizenz, ...)</a>
    </div>
      <!---─────────────────────Sidebar-Handy─────────────────────--->
      <div id="sidebarM">
        <div id="menuM" class="mNav">
          <b>&nbsp;&nbsp;Hallo ' . $_COOKIE["login_user"] . '!<br>
          <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><a href=""></a>
          <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="mGit" target="_blank">Github (Funktion, Lizenz, ...)</a>
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
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_COOKIE['login_user'];
    $error = "";
    if ($adminrow['id'] != 1) {
      if($_POST['backwards'] <= "101" && $_POST['backwards'] >= "0"){
        $newbackwards =  htmlspecialchars($_POST['backwards']);
        $sql = "UPDATE accounts SET backwards='$newbackwards' WHERE username='$uname'";
        mysqli_query($db, $sql);
      }else {
        $error = $error . "Zahl liegt nicht im erlaubten Bereich!<br>";
      }
  
      if($_POST['github'] == "" || $_POST['github'] == "on"){
        $newgithub =  htmlspecialchars($_POST['github']);
        $sql = "UPDATE accounts SET github='$newgithub' WHERE username='$uname'";
        mysqli_query($db, $sql);
      }else {
        $error = $error . "Github liegt nicht im erlaubten Bereich!<br>";
      }
    }

    if(!empty($_POST['newpass'])){
        if($_POST['newpass'] == $_POST['renewpass']){
            $newpass =  htmlspecialchars($_POST['newpass']);
            $sql = "UPDATE accounts SET password='$newpass' WHERE username='$uname'";
            mysqli_query($db, $sql);
            $error = $error .  "Neues Passwort wurde gespeichert!";
        }else {
            $error = $error .  "Die Passwörter stimmen nicht überein!<br>";
        }
    }
    if ($adminrow['id'] != 1) {
      $newplayback =  htmlspecialchars($_POST['speed']);
      $sql = "UPDATE accounts SET playback='$newplayback' WHERE username='$uname'";
      mysqli_query($db, $sql);
    }
  }
  $sql = "SELECT * FROM accounts WHERE username = '$usernametest'";
  $accresult = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($accresult);
  
  //─────────────────────HTML─────────────────────
  echo '
  <div class="one" id="one"><div class="two"><div class="settingslogin">
  ';
  if ($adminrow['id'] == 1) {
    echo '
    <img src="back1.svg" alt="Zurück" onclick="location.href=\'./admin.php\'" class="settingsback"><br>
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
      ';
  }elseif ($adminrow['id'] != 1) {
    echo '
    <img src="back1.svg" alt="Zurück" onclick="location.href=\'./index.php\'" class="settingsback"><br>
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
      <input id="backwards" type="range" min="0" max="100" value="' . $row["backwards"] . '" name="backwards"
      ';
      if($row["backwards"] == "on"){echo "checked";}
      echo '
      class="regler" />
      <span id="currentrange" style="width:3ch;"></span>
      <label class="labelhide"></label>
      <div class="popup" onclick="myFunction()">Gebärdenabfrage (Klicke für Hilfe)
        <span class="popuptext" id="myPopup">Hier kannst du die Wahrscheinlichkeit angeben, mit der du nach den Gebärden gefragt wirst (100 = immer bietet sich an wenn man sehr weit ist, 0 = nie). Da man das in dieser Umgebung nicht kontrollieren kann, ist deine Ehrlichkeit gefragt.
          Du musst es wirklich exakt genau richtig machen, damit die Vokabel ein Level hoch kommt. Es werden nur Vokabeln genommen, die du auf Level 2 hast (also einmal richtig eingegeben).
      <br><br><em>Klicke hier um das Popup zu schließen</em></span></div>
      <label style="width: 100%; height:30px;"></label>
      <label class="form-control">
        <input type="checkbox" name="github"';
        if($row['github'] == "on"){echo "checked";}
        echo '/>Github Fehlermeldung
      </label>
      <label style="width: 100%; height:40px;"></label>
      <p class="selectclass">Wiedergabegeschwindigkeit:&nbsp;&nbsp;</p>
      <select name="speed" required class="selectclass">
        <option '; if($row["playback"] == 0.25){echo "selected";} echo ' value="0.25">0,25</option>
        <option '; if($row["playback"] == 0.5){echo "selected";} echo ' value="0.5">0,5</option>
        <option '; if($row["playback"] == 1){echo "selected";} echo ' value="1">1</option>
        <option '; if($row["playback"] == 1.25){echo "selected";} echo ' value="1.25">1,25</option>
        <option '; if($row["playback"] == 1.5){echo "selected";} echo ' value="1.5">1,5</option>
        <option '; if($row["playback"] == 1.75){echo "selected";} echo ' value="1.75">1,75</option>
        <option '; if($row["playback"] == 2){echo "selected";} echo ' value="2">2</option>
      </select>
      ';
      }
      echo '
      <label style="width: 100%; height:40px;"></label>
      <input class="settingspass" type="password" name="newpass" placeholder="Neues Passwort (optional)" /><br><br>
      <input type="password" name="renewpass" placeholder="Neues Passwort wiederholen" /><br>
      ';
      echo $error;
      echo '
      <br><br>
      <input type="submit" name="login" value="Speichern" />
    </form>
  </div></div></div>
  <script>
    var slider = document.getElementById("backwards");
    var output = document.getElementById("currentrange");
    output.innerHTML = slider.value; // Display the default slider value
    
    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
      output.innerHTML = this.value;
    }

    function myFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }
  </script>
  ';
  }else{
    echo '
    <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding: 70px 20px;"><a href="./index.php" style="color: #b7c7e2">Bitte logge dich erst hier ein!</a></p></div></div></div>
    ';
  }
  echo '
</body>

</html>
';
?>