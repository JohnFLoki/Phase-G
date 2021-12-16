<!-----https://gebaerdenlernen.de/index.php----->
<?php
  //session_start();
  if($_GET['logout'] == 1){
    // remove all session variables
    //session_unset();
    // destroy the session
    //session_destroy();
    setcookie("login_user", "", time() - 3600, '', '', true);
    echo $_COOKIE['login_user'];
    sleep(2);
    header("location: ./index.php");
  }
?>
<html>
<head>
  <title>Phase-G</title>
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
        <td class="hallo"><b>Hallo <?php /*echo $_SESSION['login_user'];*/ echo $_COOKIE['login_user'] ?>! <img src="settings.svg" alt="Settings" height="15px" onclick="location.href='./settings.php'" style="cursor: pointer;"></b></td>
        <td class="hallob" onclick="location.href='./index.php?logout=1'"><b>Ausloggen</b></td>
    </tr>
  </table>
  </div></div>
  <!---─────────────────────Stats─────────────────────--->
  <!---─────────────────────Sidebar-PC─────────────────────--->
  <div id="dmenuM" class="dnav">
  <img src="back.svg" alt="Zurück" class="dback" height="18px">
    <b>&nbsp;&nbsp;Hallo <?php /*echo $_SESSION['login_user'];*/ echo $_COOKIE['login_user'] ?>! <img src="settings.svg" alt="Settings" height="18px" onclick="location.href='./settings.php'" style="cursor: pointer;"><br>
    <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><br><br>
    &nbsp;&nbsp;Deine Stats:<br>
<?php
    $statssql0 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '0'");
    $statssql1 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '1'");
    $statssql2 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '2'");
    $statssql3 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '3'");
    $statssql4 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '4'");
    $statssql5 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '5'");
    $statssql6 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '6'");
    $statssql7 = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` = '7'");
    $count0 = mysqli_num_rows($statssql0);
    $count1 = mysqli_num_rows($statssql1);
    $count2 = mysqli_num_rows($statssql2);
    $count3 = mysqli_num_rows($statssql3);
    $count4 = mysqli_num_rows($statssql4);
    $count5 = mysqli_num_rows($statssql5);
    $count6 = mysqli_num_rows($statssql6);
    $count7 = mysqli_num_rows($statssql7);
    echo "&nbsp;&nbsp;Level 0: &nbsp;&nbsp;" . $count0 . "<br>";
    echo "&nbsp;&nbsp;Level 1: &nbsp;&nbsp;" . $count1 . "<br>";
    echo "&nbsp;&nbsp;Level 2: &nbsp;&nbsp;" . $count2 . "<br>";
    echo "&nbsp;&nbsp;Level 3: &nbsp;&nbsp;" . $count3 . "<br>";
    echo "&nbsp;&nbsp;Level 4: &nbsp;&nbsp;" . $count4 . "<br>";
    echo "&nbsp;&nbsp;Level 5: &nbsp;&nbsp;" . $count5 . "<br>";
    echo "&nbsp;&nbsp;Level 6: &nbsp;&nbsp;" . $count6 . "<br>";
    echo "&nbsp;&nbsp;Level 7: &nbsp;&nbsp;" . $count7 . "";
?>
<a href="https://github.com/JohnFCreep/Phase-G#funktion" class="dgitM" target="_blank">Github (Funktion, Lizenz, ...)</a>
  </div>

  <!---─────────────────────Sidebar-Handy─────────────────────--->
  <div id="sidebar">
    <div id="menuM" class="nav">
      <b>&nbsp;&nbsp;Hallo <?php echo $_COOKIE['login_user'] ?>! <img src="settings.svg" alt="Settings" height="26px" onclick="location.href='./settings.php'" style="cursor: pointer;"><br>
      <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><br><br>
      &nbsp;&nbsp;Deine Stats:<br>
<?php
      echo "&nbsp;&nbsp;Level 0: &nbsp;&nbsp;" . $count0 . "<br>";
      echo "&nbsp;&nbsp;Level 1: &nbsp;&nbsp;" . $count1 . "<br>";
      echo "&nbsp;&nbsp;Level 2: &nbsp;&nbsp;" . $count2 . "<br>";
      echo "&nbsp;&nbsp;Level 3: &nbsp;&nbsp;" . $count3 . "<br>";
      echo "&nbsp;&nbsp;Level 4: &nbsp;&nbsp;" . $count4 . "<br>";
      echo "&nbsp;&nbsp;Level 5: &nbsp;&nbsp;" . $count5 . "<br>";
      echo "&nbsp;&nbsp;Level 6: &nbsp;&nbsp;" . $count6 . "<br>";
      echo "&nbsp;&nbsp;Level 7: &nbsp;&nbsp;" . $count7 . "";
?>
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
      
    //─────────────────────Prüfung─────────────────────
    if($_GET["post"] == 1){
      if($_COOKIE["richtung"] == "norm"){
?>
        <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding-top: 70px;">
<?php
        $lastid = $_COOKIE["last"];
        $lastcurrent = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `id` = '$lastid'");
        $lastrow = mysqli_fetch_assoc($lastcurrent);
        $newlevel = $lastrow["level"];
        if($_POST["wort"] == $lastrow["name"]){
          //─────────────────────richtig─────────────────────
          echo "Richtig das Wort war \"" . $lastrow["name"] . "\".";
          if($lastrow["level"] < 7){
            $newlevel = $newlevel + 1;
            $sql = "UPDATE words_$DB_UNAME SET level='$newlevel' WHERE id='$lastid'";
            mysqli_query($dbw, $sql);
          }
        }else{
          //─────────────────────falsch─────────────────────
          echo "Falsch! Das Wort war \"" . $lastrow['name'] . "\".";
          if($lastrow["level"] != 0){
            $newlevel = $newlevel - 1;
            $sql = "UPDATE words_$DB_UNAME SET level='$newlevel' WHERE id='$lastid'";
            mysqli_query($dbw, $sql);
          }
        }
        $date2 = date("d-m-Y");
        $date = date_create($date2);
        switch ($newlevel) {
          case "0":
            $interval = date_interval_create_from_date_string('0 days');
            break;
          case "1":
            $interval = date_interval_create_from_date_string('5 days');
            break;
          case "2":
            $interval = date_interval_create_from_date_string('20 days');
            break;
          case "3":
            $interval = date_interval_create_from_date_string('40 days');
            break;
          case "4":
            $interval = date_interval_create_from_date_string('80 days');
            break;
          case "5":
            $interval = date_interval_create_from_date_string('160 days');
            break;
          case "6":
            $interval = date_interval_create_from_date_string('320 days');
            break;
          case "7":
            $interval = date_interval_create_from_date_string('15 months');
            break;
        }
        $date = date_create(date("d-m-Y"));
        $res = date_add($date, $interval);   
        $newdate = date_format($res, "Ymd");
        $sql = "UPDATE words_$DB_UNAME SET date='$newdate' WHERE id='$lastid'";
        mysqli_query($dbw, $sql);
        setcookie("last", -1, 0, '', '', true);
?>
        </p>
            <form method="post" action="./index.php">
              <input type="submit" name="" value="Weiter" />
            </form>
        </div></div></div>
<?php
      }elseif ($_COOKIE["richtung"] == "back") {
        $lastid = $_COOKIE["last"];
        $lastcurrent = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `id` = '$lastid'");
        $lastrow = mysqli_fetch_assoc($lastcurrent);
?>
        <div class="one" id="one"><div class="two"><div class="answer"><p style="text-align: center;">
            <table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                <video height="480" width="640" controls loop autoplay>
                  <source src="./video/<?php echo $lastrow['link']; ?>.mp4" type="video/mp4">
                </video></p>
                </td>
                <td class="rebackpadleft">
                  <div class="rebackrahmen">
                    <p class="mobilep">Die Vokabel war "<?php echo $lastrow['name']; ?>".</p>
                    <form method="post" action="./index.php?back=1" class="<?php if($accrow['github'] == "on"){echo 'backnogit';} ?>">
                      <label class="form-control" style="margin:0 0 20px 0;">
                        <input type="checkbox" name="selfcheck" />Ich habe die Gebärde richtig.
                      </label>
                      <input type="submit" name="" value="Weiter" />
                    </form>
                  </div>
                </td>
              </tr>
            </table>
<?php
        if($accrow['github'] == "on"){
?>
    <a class="backformtwo rebackformtwo" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft TtG&body=Link: <?php echo $lastrow['link']; ?>" target="_blank">Sollte das Video nicht laden, klicke hier (Github).</a>
<?php
        }
?>
        </div></div></div>
<?php
      }
    }elseif($_GET["back"] == 1){
      $lastid = $_COOKIE["last"];
      $lastcurrent = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `id` = '$lastid'");
      $lastrow = mysqli_fetch_assoc($lastcurrent);
      $newlevel = $lastrow["backlevel"];
      if($_POST["selfcheck"] == "on"){
        //─────────────────────richtig─────────────────────
        if($lastrow["backlevel"] < 7){
          $newlevel = $newlevel + 1;
          $sql = "UPDATE words_$DB_UNAME SET backlevel='$newlevel' WHERE id='$lastid'";
          mysqli_query($dbw, $sql);
        }
      }else{
        //─────────────────────falsch─────────────────────
        if($lastrow["backlevel"] != 0){
          $newlevel = $newlevel - 1;
          $sql = "UPDATE words_$DB_UNAME SET backlevel='$newlevel' WHERE id='$lastid'";
          mysqli_query($dbw, $sql);
        }
      }
      $date2 = date("d-m-Y");
      $date = date_create($date2);
      switch ($newlevel) {
        case "0":
          $interval = date_interval_create_from_date_string('0 days');
          break;
        case "1":
          $interval = date_interval_create_from_date_string('5 days');
          break;
        case "2":
          $interval = date_interval_create_from_date_string('20 days');
          break;
        case "3":
          $interval = date_interval_create_from_date_string('40 days');
          break;
        case "4":
          $interval = date_interval_create_from_date_string('80 days');
          break;
        case "5":
          $interval = date_interval_create_from_date_string('160 days');
          break;
        case "6":
          $interval = date_interval_create_from_date_string('320 days');
          break;
        case "7":
          $interval = date_interval_create_from_date_string('15 months');
          break;
      }
      $date = date_create(date("d-m-Y"));
      $res = date_add($date, $interval);   
      $newdate = date_format($res, "Ymd");
      $sql = "UPDATE words_$DB_UNAME SET backdate='$newdate' WHERE id='$lastid'";
      mysqli_query($dbw, $sql);
      setcookie("last", -1, 0, '', '', true);
      header('Location: ./index.php');
    }else{
      //─────────────────────Zufallswahl─────────────────────
      //4660 einträge
      //date-calc
      $time = date("Ymd");
      //https://www.mysqltutorial.org/select-random-records-database-table.aspx
      //https://stackoverflow.com/questions/7060439/mysql-select-row-where-field-is-smaller-than-other

      $current = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `date` <= '$time' ORDER BY RAND() LIMIT 1");
      $row = mysqli_fetch_assoc($current);
      $count = mysqli_num_rows($current);
      $backcurrent = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` > '1' AND `backdate` <= '$time' ORDER BY RAND() LIMIT 1");
      $backrow = mysqli_fetch_assoc($backcurrent);
      $backcount = mysqli_num_rows($backcurrent);
      $check = "0";
      $mysqlday = "0";
      $backmysqlday = "0";

      if($count != 0 && $accrow['backwards'] != 100){
        $check = $check . "1";
      }elseif($accrow['backwards'] != 100){
        $mysqlday = mysqli_fetch_assoc(mysqli_query($dbw, "SELECT MIN(date) FROM words_$DB_UNAME"));
      }

      if($backcount != 0 && $accrow['backwards'] != 0){
        $check = $check . "2";
      }elseif($accrow['backwards'] != 0){
        $backmysqlday = mysqli_fetch_assoc(mysqli_query($dbw, "SELECT MIN(backdate) FROM words_$DB_UNAME WHERE `level` > '1'"));
      }

      if($check == "0"){
        if(($backmysqlday <= $mysqlday && $backmysqlday != "0") || ($backmysqlday <= $mysqlday && $mysqlday == "0")){
          $mysqlday =  $backmysqlday;
        }
        $tmp1 = $mysqlday;
        $tmp2 = $mysqlday;
        $tmp3 = $mysqlday;
        $nextday = substr($tmp1, 6) . "-" . substr($tmp2, 4, 2) . "-" . substr($tmp3, 0, 5);
?>
  <div class="one" id="one"><div class="two"><div class="login">Du hast bereits alle Vokabeln für heute abgearbeitet. Der <?php echo $nextday;?> ist dein nächster Lerntag.</div></div></div>
<?php
      }else{
        $randbackwards = rand(1, 100);
        if($check == "01"){ 
          $randbackwards = 101;
        }elseif ($check == "02") {
          $randbackwards = 0;
        }
      
        //─────────────────────Antwort─────────────────────
        if($randbackwards <= $accrow['backwards']){

          //─────────────────────backwards─────────────────────
          $statssql = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` > '1' AND `backdate` <= '$time'");
          $counttoday = mysqli_num_rows($statssql);
          setcookie("richtung", "back", 0, '', '', true);
          setcookie("last", $backrow['id'], 0, '', '', true);
?>
  <div class="one" id="one"><div class="two"><div class="backanswer">
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td class="backpadleft">
          <p class="mobilep">Vokabellevel: <?php echo $backrow['backlevel']; ?><br>
          Text zu Gebärde heute fällig: <?php echo $counttoday; ?></p>
          <form class="<?php if($accrow['github'] == "on"){echo 'backnogit';} ?> formone" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?post=1">
            <textarea name="wort" placeholder="Antwort" disabled><?php echo $backrow['name']; ?></textarea>
            <input type="submit" name="login" value="Zeige die Gebärde" />
          </form>
        </td>
      </tr>
    </table>
<?php
        if($accrow['github'] == "on"){
?>
    <a class="backformtwo" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft TtG&body=Name: <?php echo $backrow['name']; ?>" target="_blank">Sollte das Wort komisch sein, klicke hier (Github).</a>
<?php
        }
?>
  </div></div></div>
<?php
        }else{
          //─────────────────────normal─────────────────────
          $statssql = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `date` <= '$time'");
          $counttoday = mysqli_num_rows($statssql);
          setcookie("richtung", "norm", 0, '', '', true);
          setcookie("last", $row['id'], 0, '', '', true);
        
?>
  <div class="one" id="one"><div class="two"><div class="answer">
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <video <?php if($accrow['github'] != "on"){echo 'class="nogitvideo"';} ?> height="480" width="640" controls loop autoplay>
            <source src="./video/<?php echo $row['link']; ?>.mp4" type="video/mp4">
          </video>
        </td>
        <td class="padleft">
          <p class="mobilep">Vokabellevel: <?php echo $row['level']; ?><br>
          Gebärde zu Text Vokalen heute fällig: <?php echo $counttoday; ?></p>
          <form class="<?php if($accrow['github'] != "on"){echo 'nogit';} ?> formone" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?post=1">
            <textarea name="wort" placeholder="Antwort" required><?php if($row['level'] == 0){echo $row['name'];} ?></textarea>
            <input type="submit" name="login" value="Senden" />
          </form>
        </td>
      </tr>
    </table>
<?php
        if($accrow['github'] == "on"){
?>
    <a class="formtwo" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft GtT&body=Name: <?php echo $row['name']; ?> %40 Link: <?php echo $row['link']; ?>" target="_blank">Sollte das Wort komisch sein, oder das Video nicht laden klicke hier (Github).</a>
<?php
        }
?>
  </div></div></div>
<?php
      }
    }
  }
  }elseif($_SERVER["REQUEST_METHOD"] == "POST") {
    //─────────────────────Authentification─────────────────────
    
    $myusername = $_POST['uname'];
    $mypassword = $_POST['pass']; 

    $sql = "SELECT * FROM accounts WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
		
    if($count == 1) {
      //$_SESSION['login_user'] = $_POST['uname'];
      setcookie('login_user', $myusername, time() + (86400 * 30), '', '', true);
?>
  <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding: 70px 20px;">Bitte warten, du wirst automatisch weitergeleitet.</p></div></div></div>
<?php
      header("Refresh:2");
    }else{
?>
  <div class="one" id="one"><div class="two"><div class="login"><br>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input type="text" name="uname" placeholder="Benutzername" required /><br><br>
      <input type="password" name="pass" placeholder="Passwort" required /><br><br>
      <b style="color: #df813b; font-size: 18px;">Benutzername oder Passwort falsch!</b>
      <input type="submit" name="login" value="Senden" />
    </form>
  </div></div></div>
<?php
    }
  }else{
?>
  <div class="one" id="one"><div class="two"><div class="login"><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input type="text" name="uname" placeholder="Benutzername" required /><br><br>
      <input type="password" name="pass" placeholder="Passwort" required /><br><br>
      <input type="submit" name="login" value="Senden" />
    </form>
  </div></div></div>
  <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="gitL gitM" target="_blank">Github (Funktion, Lizenz, ...)</a>
<?php
  } 
?>
  <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="git" target="_blank">Github (Funktion, Lizenz, ...)</a>
</body>

</html>