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
    echo '<div id="sidebar-head">
    <!---─────────────────────Sidebar-PC────────────────────────--->
    <div class="dNav">
    <img src="back.svg" alt="Zurück" class="dNavButton" height="18px">
      <b>&nbsp;&nbsp;Hallo ' . $_COOKIE["login_user"] . '!<br>
      <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b>
    <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="dGit" target="_blank">Github (Funktion, Lizenz, ...)</a>
    </div>
    <!---─────────────────────Sidebar-Handy─────────────────────--->
    <div id="mSidebar">
      <div id="menuM">
        <b>&nbsp;&nbsp;Hallo ' . $_COOKIE["login_user"] . '!<br>
        <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><a href=""></a>
        <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="mGit" target="_blank">Github (Funktion, Lizenz, ...)</a>
      </div>
      <span class="open" id="mButton">
        <button class="currentclose" onClick="toggleMenu(this)" id="mButtoninner">
          ☰
        </button>
      </span>
    </div>
    <script>
      function toggleMenu(mButton) { 
        if ( mButton.className === "currentclose" ) {
          document.getElementById("menuM").style.marginRight = "0px";
          document.getElementById("mButtoninner").style.right = "280px";
          document.getElementById("one").style.left = "-250px";
          mButton.className = "";
        } else {
          document.getElementById("menuM").style.marginRight = "-250px";
          document.getElementById("mButtoninner").style.right = "30px";
          document.getElementById("one").style.left = "0px";
          mButton.className = "currentclose";
        }
      }
    </script>
</div>';
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_COOKIE['login_user'];
    $error = "";
    if ($adminrow['id'] != 1) {
      if($_POST['backwards'] <= "100" && $_POST['backwards'] >= "0"){
        $newbackwards =  htmlspecialchars($_POST['backwards']);
        $sql = "UPDATE accounts SET backwards='$newbackwards' WHERE username='$uname'";
        mysqli_query($db, $sql);
      }else {
        $error = $error . "Regler-Zahl liegt nicht im erlaubten Bereich!<br>";
      }
      
      if($_POST['start'] <= "7" && $_POST['start'] >= "0"){
        $newbackstart =  htmlspecialchars($_POST['start']);
        $sql = "UPDATE accounts SET backstart='$newbackstart' WHERE username='$uname'";
        mysqli_query($db, $sql);
      }else {
        $error = $error . "Level liegt nicht im erlaubten Bereich!<br>";
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
  <div class="one" id="one"><div class="two"><div class="bubble settingsbubble">
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
      <section class="expand">
        <input type="checkbox" name="collapse" id="expandbutton">
        <h2 class="expandclick" onclick="closeFunction()">
            <label for="expandbutton">Text zu Gebärde Optionen</label>
        </h2>
        <div class="content" id="contenttoggle">
          <input id="backwards" type="range" min="0" max="100" value="' . $row["backwards"] . '" name="backwards" class="regler" />
          <span id="currentrange" style="width:3ch;"></span>
          <div class="popup" onclick="popFunction()">Gebärdenabfrage (Klicke für Hilfe)
            <span class="popuptext" id="myPopup">Hier kannst du die Wahrscheinlichkeit angeben, mit der du nach den Gebärden gefragt wirst (100 = immer bietet sich an wenn man sehr weit ist, 0 = nie). Da man das in dieser Umgebung nicht kontrollieren kann, ist deine Ehrlichkeit gefragt.
              Du musst es wirklich exakt genau richtig machen, damit die Vokabel ein Level hoch kommt. Es werden nur Vokabeln genommen, die du auf Level 2 hast (also einmal richtig eingegeben).
          <br><br><em>Klicke hier um das Popup zu schließen</em></span></div>
          <label style="width: 100%; height:40px; display: block; background: unset !important;"></label>
          <p class="selectclass" style="padding:0 20px 5px 20px; text-align:center;">Ab welchem Level möchtest du Gebärden machen (0&nbsp;geeignet&nbsp;für&nbsp;Muttersprachler, 2&nbsp;ist&nbsp;Standard)?</p>
          <select name="start" required class="selectclass">
            <option '; if($row["backstart"] == 0){echo "selected";} echo ' value="0">0</option>
            <option '; if($row["backstart"] == 1){echo "selected";} echo ' value="1">1</option>
            <option '; if($row["backstart"] == 2){echo "selected";} echo ' value="2">2</option>
            <option '; if($row["backstart"] == 3){echo "selected";} echo ' value="3">3</option>
            <option '; if($row["backstart"] == 4){echo "selected";} echo ' value="4">4</option>
            <option '; if($row["backstart"] == 5){echo "selected";} echo ' value="5">5</option>
            <option '; if($row["backstart"] == 6){echo "selected";} echo ' value="6">6</option>
            <option '; if($row["backstart"] == 7){echo "selected";} echo ' value="7">7</option>
          </select>
        </div>
      </section>
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

    function popFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
      if ( document.getElementById("contenttoggle").style.overflow === "unset" ) {
        document.getElementById("contenttoggle").style.overflow = "";
      } else {
        document.getElementById("contenttoggle").style.overflow = "unset";
      }
    }
    function closeFunction() {
      if ( document.getElementById("contenttoggle").style.overflow === "unset" ) {
        document.getElementById("contenttoggle").style.overflow = "";
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
      }
    }
  </script>
  ';
  }else{
    echo '
    <div class="one" id="one"><div class="two"><div class="bubble notice"><p style="padding-bottom: 0px;"><a href="./index.php" style="color: #b7c7e2">Bitte logge dich erst hier ein!</a></p></div></div></div>
    ';
  }
  echo '
</body>

</html>
';
?>