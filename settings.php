<html>
<head>
  <title>Einstellungen</title>
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="viewport" content="width=700px, user-scalable=no">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
  include './database.php';
  if($account == 1){
    
    //─────────────────────Account-PC─────────────────────
?>
  <div class="middle"><div class="hello">
    <table cellspacing="0" cellpadding="0">
        <tr>
          <td class="hallo"><b>Hallo <?php /*echo $_SESSION['login_user'];*/ echo $_COOKIE['login_user'] ?>!</b></td>
          <td class="hallob" onclick="location.href='./index.php?logout=1'"><b>Ausloggen</b></td>
      </tr>
    </table>
  </div></div>
  <!---─────────────────────Handy─────────────────────--->
  <div id="sidebar">
    <div id="menuM" class="nav">
      <b>&nbsp;&nbsp;Hallo <?php /*echo $_SESSION['login_user'];*/ echo $_COOKIE['login_user'] ?>!<br>
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
    if ( button.className === 'currentclose' ) {
      document.getElementById('menuM').style.marginRight = '0px';
      document.getElementById('buttoninner').style.right = '280px';
      document.getElementById('one').style.left = '-250px';
      button.className = '';
    } else {
      document.getElementById('menuM').style.marginRight = '-250px';
      document.getElementById('buttoninner').style.right = '30px';
      document.getElementById('one').style.left = '0px';
      button.className = 'currentclose';
    }
  }
</script>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";

    if($_POST['backwards'] <= "101" && $_POST['backwards'] >= "0"){
      $newbackwards = $_POST['backwards'];
      $uname = $_COOKIE['login_user'];
      $sql = "UPDATE accounts SET backwards='$newbackwards' WHERE username='$uname'";
      mysqli_query($db, $sql);
    }else {
      $error = $error . "Zahl liegt nicht im erlaubten Bereich!<br>";
    }

    if($_POST['github'] == "" || $_POST['github'] == "on"){
      $newgithub = $_POST['github'];
      $sql = "UPDATE accounts SET github='$newgithub' WHERE username='$uname'";
      mysqli_query($db, $sql);
    }else {
      $error = $error . "Github liegt nicht im erlaubten Bereich!<br>";
    }

    if(!empty($_POST['newpass'])){
        if($_POST['newpass'] == $_POST['renewpass']){
            $newpass = $_POST['newpass'];
            $sql = "UPDATE accounts SET password='$newpass' WHERE username='$uname'";
            mysqli_query($db, $sql);
            $error = $error .  "Neues Passwort wurde gespeichert!";
        }else {
            $error = $error .  "Die Passwörter stimmen nicht überein!<br>";
        }
    }
  }
  $sql = "SELECT * FROM accounts WHERE username = '$usernametest'";
  $accresult = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($accresult);
?>
  <div class="one" id="one"><div class="two"><div class="settingslogin"><br>
  <img src="back.svg" alt="Zurück" height="18px" onclick="location.href='./index.php'" style="cursor: pointer; margin-left: 19px;"><br>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input id="backwards" type="range" min="0" max="100" value="<?php echo $row['backwards']; ?>" name="backwards" <?php if($row['backwards'] == "on"){echo "checked";} ?> class="regler" />
      <span id="currentrange" style="width:3ch;"></span>
      <div class="popup" onclick="myFunction()">Gebärdenabfrage (Klicke für Hilfe)
        <span class="popuptext" id="myPopup">Hier kannst du die Wahrscheinlichkeit angeben, mit der du nach den Gebärden gefragt wirst (100 = immer bietet sich an wenn man sehr weit ist, 0 = nie). Da man das in dieser Umgebung nicht kontrollieren kann, ist deine Ehrlichkeit gefragt.
          Du musst es wirklich exakt genau richtig machen, damit die Vokabel ein Level hoch kommt. Es werden nur Vokabeln genommen, die du auf Level 2 hast (also einmal richtig eingegeben).
      <br><br>Klicke hier um das Popup zu schließen</span></div>
      <label style="width: 100%; height:30px;"></label>
      <label class="form-control">
        <input type="checkbox" name="github" <?php if($row['github'] == "on"){echo "checked";} ?> />Github Fehlermeldung
      </label>
      <label style="width: 100%; height:40px;"></label>
      <input style="margin-top: 75px;" type="password" name="newpass" placeholder="Neues Passwort" /><br><br>
      <input type="password" name="renewpass" placeholder="Neues Passwort wiederholen" /><br>
      <?php echo $error; ?><br><br>
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
<?php
  }else{
?>
    <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding: 70px 20px;"><a href="./index.php" style="color: #b7c7e2">Bitte logge dich erst hier ein!</a></p></div></div></div>
<?php
  }
?>
  <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="git" target="_blank">Github (Funktion, Lizenz, ...)</a>
</body>

</html>