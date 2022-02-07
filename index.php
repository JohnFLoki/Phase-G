<?php

  //Quellen:
  //      https://www.mysqltutorial.org/select-random-records-database-table.aspx
  //      Playback Speed: https://www.w3schools.com/Tags/tryit.asp?filename=tryhtml5_av_prop_playbackrate
  //      https://gebaerdenlernen.de/index.php

  //session_start();
  if($_GET['logout'] == 1){
    setcookie("login_user", "", time() - 3600, '', '', true);
    echo $_COOKIE['login_user'];
    sleep(1);
    header("location: ./index.php");
  }

//─────────────────────HTML─────────────────────
echo '
<html>
<head>
  <title>Phase-G</title>
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="viewport" content="width=700px, user-scalable=no">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
';

  include './database.php';

  if($accrow['github'] == "on"){$nogitvideo = ''; $gitallow = 'gitallow ';}else{$nogitvideo = 'nogitvideo'; $gitallow = '';}

  if ($accrow['id'] == 1) {
    echo '
    <div class="one" id="one"><div class="two"><div class="bubble notice"><p style="padding-bottom: 70px;"><a href="./admin.php" style="color: #b7c7e2">Hier kommst du zum Admin-Panel.</a></p></div></div></div>
    ';
  }elseif($account == 1){
    //─────────────────────Account-PC─────────────────────
    $backstart = $accrow['backstart'];
    //─────────────────────HTML─────────────────────
    echo '<div id="sidebar-head">
    <!---─────────────────────Sidebar-PC────────────────────────--->
    <div class="dNav">
      <img src="back.svg" alt="Zurück" class="dNavButton" height="18px">
      <b>&nbsp;&nbsp;Hallo ' . $_COOKIE['login_user'] . '! <img src="settings.svg" alt="Settings" height="18px" onclick="location.href=\'./settings.php\'" style="cursor: pointer;"><br>
      <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><br><br>
      &nbsp;&nbsp;Deine Statistik:<br>
      ';
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

      //─────────────────────HTML─────────────────────
      echo '
      <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="dGit" target="_blank">Github (Funktion, Lizenz, ...)</a>
    </div>

    <!---─────────────────────Sidebar-Handy─────────────────────--->
    <div id="mSidebar">
      <div id="menuM">
        <b>&nbsp;&nbsp;Hallo ' . $_COOKIE['login_user'] . '! <img src="settings.svg" alt="Settings" height="26px" onclick="location.href=\'./settings.php\'" style="cursor: pointer;"><br>
        <a href="./index.php?logout=1" style="color:#8497a8; text-decoration: none !important;">&nbsp;&nbsp;Ausloggen</a></b><br><br>
        &nbsp;&nbsp;Deine Statistik:<br>
        ';
        echo "&nbsp;&nbsp;Level 0: &nbsp;&nbsp;" . $count0 . "<br>";
        echo "&nbsp;&nbsp;Level 1: &nbsp;&nbsp;" . $count1 . "<br>";
        echo "&nbsp;&nbsp;Level 2: &nbsp;&nbsp;" . $count2 . "<br>";
        echo "&nbsp;&nbsp;Level 3: &nbsp;&nbsp;" . $count3 . "<br>";
        echo "&nbsp;&nbsp;Level 4: &nbsp;&nbsp;" . $count4 . "<br>";
        echo "&nbsp;&nbsp;Level 5: &nbsp;&nbsp;" . $count5 . "<br>";
        echo "&nbsp;&nbsp;Level 6: &nbsp;&nbsp;" . $count6 . "<br>";
        echo "&nbsp;&nbsp;Level 7: &nbsp;&nbsp;" . $count7 . "";
        
        //─────────────────────HTML─────────────────────
        echo '
        <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="mGit" target="_blank">Github (Funktion, Lizenz, ...)</a>
      </div>
      <span id="mButton">
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
    if($_GET["post"] == 1){
      //─────────────────────normal test─────────────────────
      if($_COOKIE["richtung"] == "norm"){

        //─────────────────────HTML─────────────────────
        echo '
        <div class="one" id="one"><div class="two"><div class="bubble notice"><p style="padding-bottom: 0px;">
          ';

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
          
          //─────────────────────HTML─────────────────────
          echo '
          </p>
          <form method="post" action="./index.php">
            <input type="submit" name="" value="Weiter" />
          </form>
        </div></div></div>
          ';

      }elseif ($_COOKIE["richtung"] == "back") {
        //─────────────────────backward response─────────────────────
        $lastid = $_COOKIE["last"];
        $lastcurrent = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `id` = '$lastid'");
        $lastrow = mysqli_fetch_assoc($lastcurrent);
        
        //─────────────────────HTML─────────────────────
        echo '
        <div class="one" id="one"><div class="two"><div class="videotable">
          <table cellspacing="0" cellpadding="0">
            <tr>
              <td>
              <video height="480" width="640" controls loop autoplay id="playback">
                <source src="./video/' . $lastrow['link']  . '.mp4" type="video/mp4">
              </video>
              </td>
              <td class="padleft rebacksubmit mobhide">
                <div class="rebackrahmen">
                  <p class="annotation">Die Vokabel war "' . $lastrow['name'] . '".</p>
                  <form method="post" action="./index.php?back=1" class="customcheck">
                    <label class="form-control" style="margin:0 0 20px 0;">
                      <input type="checkbox" name="selfcheck" />Ich habe die Gebärde richtig.
                    </label>
                    <input type="submit" name="" value="Weiter" />
                  </form>
                </div>
              </td>
            </tr>
            <tr class="deskhide">
              <td class="padleft rebacksubmit deskhide">
                <div class="deskhide">
                  <p class="annotation deskhide">Die Vokabel war "' . $lastrow['name'] . '".</p>
                  <form method="post" action="./index.php?back=1" class="' . $gitallow . 'customcheck" style="margin:0;">
                    <label class="form-control" style="margin:0 0 20px 0;">
                      <input type="checkbox" name="selfcheck" />Ich habe die Gebärde richtig.
                    </label>
                    <input type="submit" name="" value="Weiter" />
                  </form>
                </div>
              </td>
            </tr>
          </table>
          ';
          if($accrow['github'] == "on"){
            echo '
            <a class="backgitreport rebackgitreport" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft TtG&body=Link:' . $lastrow['link'] . '" target="_blank">Sollte das Video nicht laden, klicke hier (Github).</a>
            ';
          }
        echo '
        </div></div></div>
        <script>
          var vid = document.getElementById("playback");
          vid.playbackRate = ' . $accrow['playback'] . ';
        </script>
        ';
      }
    }elseif($_GET["back"] == 1){
      //─────────────────────backward test─────────────────────
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
      //date-calc
      $time = date("Ymd");

      $current = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `date` <= '$time' ORDER BY RAND() LIMIT 1");
      $row = mysqli_fetch_assoc($current);
      $count = mysqli_num_rows($current);
      $backcurrent = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` >= '$backstart' AND `backdate` <= '$time' ORDER BY RAND() LIMIT 1");
      $backrow = mysqli_fetch_assoc($backcurrent);
      $backcount = mysqli_num_rows($backcurrent);
      $check = "0";

      if($count != 0 && $accrow['backwards'] != 100){
        $check = $check . "1";
      }
      if($backcount != 0 && $accrow['backwards'] != 0){
        $check = $check . "2";
      }
      if($check == "0"){
        $normmysqlday = mysqli_fetch_assoc(mysqli_query($dbw, "SELECT MIN(date) AS date FROM words_$DB_UNAME"));
        $backmysqlday = mysqli_fetch_assoc(mysqli_query($dbw, "SELECT MIN(backdate) AS backdate FROM words_luci WHERE `level` >= '$backstart'"));
        $mysqlday = $backmysqlday['backdate'];
        if($accrow['backwards'] == 0){
          $mysqlday = $normmysqlday['date'];
        }elseif($normmysqlday['date'] < $backmysqlday['backdate'] && $accrow['backwards'] != 100){
          $mysqlday = $normmysqlday['date'];
        }
        $tmp1 = $mysqlday;
        $tmp2 = $mysqlday;
        $tmp3 = $mysqlday;
        $nextday = substr($tmp1, 6) . "-" . substr($tmp2, 4, 2) . "-" . substr($tmp3, 0, 4);
        //─────────────────────Vokabeln leer─────────────────────

        //─────────────────────HTML─────────────────────
        echo '
        <div class="one" id="one"><div class="two"><div class="bubble notice"><p style="padding-bottom: 70px;">Du hast bereits alle Vokabeln für heute abgearbeitet. Der ' . $nextday . ' ist dein nächster Lerntag.</p></div></div></div>
        ';

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
          $statssql = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `level` >= '$backstart' AND `backdate` <= '$time'");
          $counttoday = mysqli_num_rows($statssql);
          setcookie("richtung", "back", 0, '', '', true);
          setcookie("last", $backrow['id'], 0, '', '', true);
  
          //─────────────────────HTML─────────────────────
          echo '
          <div class="one" id="one"><div class="two"><div class="bubble ' . $gitallow . 'backanswer">
            <table cellspacing="0" cellpadding="0">
              <tr>
                <td class="backpadleft">
                  <p class="annotation">Vokabellevel: ' . $backrow['backlevel'] . '<br>
                  Text zu Gebärde heute fällig: ' . $counttoday . '</p>
                  <form class="backform ///" method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '?post=1">
                    <textarea name="wort" placeholder="Antwort" disabled>' . $backrow['name'] . '</textarea>
                    <input type="submit" name="login" value="Zeige die Gebärde" />
                  </form>
                </td>
              </tr>
            </table>
            ';
            if($accrow['github'] == "on"){
              echo '
              <a class="backgitreport" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft TtG&body=Name: ' . $backrow["name"] . ' %40 Link: ' . $backrow["link"] . '" target="_blank">Sollte das Wort komisch sein, klicke hier (Github).</a>
              ';
            }
          echo '
          </div></div></div>
          ';
  
        }else{
          //─────────────────────normal─────────────────────
          $statssql = mysqli_query($dbw, "SELECT * FROM words_$DB_UNAME WHERE `date` <= '$time'");
          $counttoday = mysqli_num_rows($statssql);
          setcookie("richtung", "norm", 0, '', '', true);
          setcookie("last", $row['id'], 0, '', '', true);
          if($row['level'] == 0){
            $rowecho = $row['name'];
          }
  
          //─────────────────────HTML─────────────────────
          echo '
          <div class="one" id="one"><div class="two"><div class="videotable">
            <table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                  <video class="' . $nogitvideo . '" height="480" width="640" controls loop autoplay id="playback">
                    <source src="./video/' . $row['link'] . '.mp4" type="video/mp4">
                  </video>
                </td>
                <td class="padleft mobhide">
                  <p class="annotation">Vokabellevel: ' . $row['level'] . '<br>
                  Gebärde zu Text heute fällig: ' . $counttoday . '</p>
                  <form class="normform" method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '?post=1">
                    <textarea name="wort" placeholder="Antwort" required autocomplete="off">' . $rowecho . '</textarea>
                    <input type="submit" name="login" value="Senden" />
                  </form>
                </td>
              </tr>
              <tr class="deskhide">
                <td class="padleft deskhide">
                  <p class="annotation deskhide">Vokabellevel: ' . $row['level'] . '<br>
                  Gebärde zu Text heute fällig: ' . $counttoday . '</p>
                  <form class="' . $gitallow . 'normform deskhide" method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '?post=1">
                    <textarea class="deskhide" name="wort" placeholder="Antwort" required autocomplete="off">' . $rowecho . '</textarea>
                    <input type="submit" name="login" value="Senden" />
                  </form>
                </td>
              </tr>
            </table>
            ';
            if($accrow['github'] == "on"){
              echo '
              <a class="normgitreport" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft GtT&body=Name: ' . $row["name"] . ' %40 Link: ' . $row["link"] . '" target="_blank">Sollte das Wort komisch sein, oder das Video nicht laden klicke hier (Github).</a>
              ';
            }
            echo '
            </div></div></div>
            <script>
              var vid = document.getElementById("playback");
              vid.playbackRate = ' . $accrow['playback'] . ';
            </script>
            ';
        }
      }
    }
  }elseif($_SERVER["REQUEST_METHOD"] == "POST") {
    //─────────────────────Authentification─────────────────────
    
    $myusername = $_POST['uname'];
    $mypassword = $_POST['pass']; 

    $sql = "SELECT * FROM accounts WHERE username = BINARY '$myusername' and password = BINARY '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
		
    if($count == 1) {
      setcookie('login_user', $myusername, time() + (86400 * 30), '', '', true);

      //─────────────────────HTML─────────────────────
      echo '
      <div class="one" id="one"><div class="two"><div class="bubble notice"><p style="padding-bottom: 70px;">Bitte warten, du wirst automatisch weitergeleitet.</p></div></div></div>
      ';
      header("Refresh:2");
    }else{

      //─────────────────────HTML─────────────────────
      echo '
      <div class="one" id="one"><div class="two"><div class="bubble"><br>
        <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
          <input type="text" name="uname" placeholder="Benutzername" required /><br><br>
          <input type="password" name="pass" placeholder="Passwort" required /><br><br>
          <b class="bubblepasswrong">Benutzername oder Passwort falsch!</b>
          <input type="submit" name="login" value="Senden" />
        </form>
      </div></div></div>
      ';
    }
  }else{
    echo '
    <div class="one" id="one"><div class="two"><div class="bubble"><br>
      <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        <input type="text" name="uname" placeholder="Benutzername" required /><br><br>
        <input type="password" name="pass" placeholder="Passwort" required /><br><br>
        <input type="submit" name="login" value="Senden" />
      </form>
    </div></div></div>
    ';
  }
  echo '
</body>
</html>
';
?>