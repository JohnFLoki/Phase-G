<!-----https://gebaerdenlernen.de/index.php----->
<?php
  //session_start();
  if($_GET['logout'] == 1){
    // remove all session variables
    //session_unset();
    // destroy the session
    //session_destroy();
    setcookie("login_user", "", time() - 3600);
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
    
    //─────────────────────Account─────────────────────
?>
  <div class="middle"><div class="hello">
  <table cellspacing="0" cellpadding="0">
      <tr>
        <td class="hallo"><b>Hallo <?php /*echo $_SESSION['login_user'];*/ echo $_COOKIE['login_user'] ?>!</b></td>
        <td class="hallob" ><b><a href="./index.php?logout=1">Ausloggen</a></b></td>
    </tr>
  </table>
  </div></div>
  <!---─────────────────────Stats─────────────────────--->
  <!---──────────────────────PC───────────────────────--->
  <div class="stats">
    <table cellspacing="10" id="menu" style="width:100%; transition: 0.7s; margin: 0 0 0 -120%;">
      <tr>
        <td>
          Deine Statistik:
        </td>
<?php
        $statssql0 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '0'");
        $statssql1 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '1'");
        $statssql2 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '2'");
        $statssql3 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '3'");
        $statssql4 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '4'");
        $statssql5 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '5'");
        $statssql6 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '6'");
        $statssql7 = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '7'");
        $count0 = mysqli_num_rows($statssql0);
        $count1 = mysqli_num_rows($statssql1);
        $count2 = mysqli_num_rows($statssql2);
        $count3 = mysqli_num_rows($statssql3);
        $count4 = mysqli_num_rows($statssql4);
        $count5 = mysqli_num_rows($statssql5);
        $count6 = mysqli_num_rows($statssql6);
        $count7 = mysqli_num_rows($statssql7);
        echo "<td>Level 0: &nbsp;" . $count0 . "</td>";
        echo "<td>Level 1: &nbsp;" . $count1 . "</td>";
        echo "<td>Level 2: &nbsp;" . $count2 . "</td>";
        echo "<td>Level 3: &nbsp;" . $count3 . "</td>";
        echo "<td>Level 4: &nbsp;" . $count4 . "</td>";
        echo "<td>Level 5: &nbsp;" . $count5 . "</td>";
        echo "<td>Level 6: &nbsp;" . $count6 . "</td>";
        echo "<td>Level 7: &nbsp;" . $count7 . "</td>";
?>
        <td>
            <a href="#" id="clicker2" onClick="closeStats()"><<</a>
        </td>
      </tr>
    </table>
  </div>
  <span class="auf" id="clicker" style="transition: 0.0s;">
    <a style="color: #81a1c1 !important;" href="#" id="clicker2" onClick="openStats()">>></a>
  </span>
  <script id="rendered-js" >
    function openStats() {
      document.getElementById('menu').style.margin = '0px';
      document.getElementById('clicker').style.visibility = 'hidden';
    }
    
    function closeStats() {
      document.getElementById('menu').style.margin = '0 0 0 -120%';
      setTimeout(function() {
        document.getElementById('clicker').style.visibility = 'visible';
      }, 500);
    }
  </script>

    <!---─────────────────────Handy─────────────────────--->
    <div id="sidebar">
      <div id="menuM" class="nav">
      <b>&nbsp;&nbsp;Hallo <?php /*echo $_SESSION['login_user'];*/ echo $_COOKIE['login_user'] ?>!<br>
      <a href="./index.php?logout=1">&nbsp;&nbsp;Ausloggen</a></b><a href=""></a><br><br>
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
?>
        <div class="one" id="one"><div class="two"><div class="login"><p style="text-align: center; padding-top: 70px;">
<?php
      if ($_COOKIE["last"] == -1) {
        echo "Bitte klicke auf weiter!";
      }else{
        $lastid = $_COOKIE["last"];
        $lastcurrent = mysqli_query($dbw, "SELECT * FROM words WHERE `id` = '$lastid'");
        $lastrow = mysqli_fetch_assoc($lastcurrent);
        $newlevel = $lastrow["level"];
        if($_POST["wort"] == $lastrow["name"]){
          //─────────────────────richtig─────────────────────
          echo "Richtig das Wort war \"" . $lastrow["name"] . "\".";
          if($lastrow["level"] < 7){
            $newlevel = $newlevel + 1;
            $sql = "UPDATE words SET level='$newlevel' WHERE id='$lastid'";
            mysqli_query($dbw, $sql);
          }
        }else{
          //─────────────────────falsch─────────────────────
          echo "Falsch! Das Wort war \"" . $lastrow['name'] . "\".";
          if($lastrow["level"] != 0){
            $newlevel = $newlevel - 1;
            $sql = "UPDATE words SET level='$newlevel' WHERE id='$lastid'";
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
        $sql = "UPDATE words SET date='$newdate' WHERE id='$lastid'";
        mysqli_query($dbw, $sql);
        setcookie("last", -1, 0);
      }
?>
</p>
    <form method="post" action="./index.php">
      <input type="submit" name="" value="Weiter" />
    </form>
</div></div></div>
<?php
    }else{
      
      //─────────────────────Zufallswahl─────────────────────
      //4660 einträge
      //date-calc
      $time = date("Ymd");
      //https://www.mysqltutorial.org/select-random-records-database-table.aspx
      //https://stackoverflow.com/questions/7060439/mysql-select-row-where-field-is-smaller-than-other
      $current = mysqli_query($dbw, "SELECT * FROM words WHERE `date` <= '$time' ORDER BY RAND() LIMIT 1");
      $row = mysqli_fetch_assoc($current);
      $count = mysqli_num_rows($current);
      if($count == 0){
        $mysqlday = mysqli_fetch_assoc(mysqli_query($dbw, "SELECT MIN(date) FROM words"));
        echo $mysqlday;
        $tmp1 = $mysqlday;
        $tmp2 = $mysqlday;
        $tmp3 = $mysqlday;
        $nextday = substr($tmp1, 6) . "-" . substr($tmp2, 4, 2) . "-" . substr($tmp3, 0, 5);
?>
  <div class="one" id="one"><div class="two"><div class="login">Du hast bereits alle Vokabeln für heute abgearbeitet. Der <?php echo $nextday;?> ist dein nächster Lerntag.</div></div></div>
<?php
      }else{
        setcookie("last", $row['id'], 0);
      
        //─────────────────────Antwort─────────────────────
        $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `date` <= '$time'");
        $counttoday = mysqli_num_rows($statssql);
        
?>
  <div class="one" id="one"><div class="two"><div class="answer">
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <video height="480" width="640" controls loop autoplay>
            <source src="./video/<?php echo $row['link']; ?>.mp4" type="video/mp4">
          </video>
        </td>
        <td class="padleft">
          <p class="mobilep">Vokabellevel: <?php echo $row['level']; ?><br>
          Vokalen heute fällig: <?php echo $counttoday; ?>
          <br><br></p>
          <form class="formone" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?post=1">
            <textarea name="wort" placeholder="Antwort" required><?php if($row['level'] == 0){echo $row['name'];} ?></textarea>
            <input type="submit" name="login" value="Senden" />
          </form>
        </td>
      </tr>
    </table>
    <a class="formtwo" href="https://github.com/JohnFCreep/Phase-G/issues/new?assignees=&labels=&template=vokabel-fehlerhaft.md&title=Vokabel fehlerhaft&body=Name: <?php echo $row['name']; ?> %40 Link: <?php echo $row['link']; ?>" target="_blank">Sollte das Wort komisch sein, oder das Video nicht laden klicke hier (Github).</a>
  </div></div></div>
<?php
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
      setcookie('login_user', $myusername, time() + (86400 * 30));
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
  <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="gitL" target="_blank">Github (Funktion, Lizenz, ...)</a>
<?php
  } 
?>
  <a href="https://github.com/JohnFCreep/Phase-G#funktion" class="git" target="_blank">Github (Funktion, Lizenz, ...)</a>
</body>

</html>