<!-----https://gebaerdenlernen.de/index.php----->
<?php
  session_start();
  if($_GET['logout'] == 1){
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    sleep(2);
    header("location: ./index.php");
  }
?>
<html>
<head>
  <title>Phase G</title>
  <meta http-equiv="Pragma" content="no-cache">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
  include './database.php';
  if($acccount == 1){
    
    //─────────────────────Account─────────────────────
?>
  <div style="top: 20px !important; right:20px !important; position: absolute;">
    Hallo <?php echo $_SESSION['login_user']; ?>!<br>
    Deine Statistik:<br>
<?php
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '0'");
      $count0 = mysqli_num_rows($statssql);
      echo "Level 0: " . $count0 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '1'");
      $count1 = mysqli_num_rows($statssql);
      echo "Level 1: " . $count1 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '2'");
      $count2 = mysqli_num_rows($statssql);
      echo "Level 2: " . $count2 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '3'");
      $count3 = mysqli_num_rows($statssql);
      echo "Level 3: " . $count3 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '4'");
      $count4 = mysqli_num_rows($statssql);
      echo "Level 4: " . $count4 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '5'");
      $count5 = mysqli_num_rows($statssql);
      echo "Level 5: " . $count5 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '6'");
      $count6 = mysqli_num_rows($statssql);
      echo "Level 6: " . $count6 . "<br>";
      $statssql = mysqli_query($dbw, "SELECT * FROM words WHERE `level` = '7'");
      $count7 = mysqli_num_rows($statssql);
      echo "Level 7: " . $count7 . "<br>";
?>
    <a href="./index.php?logout=1"><button>Ausloggen</button></a><br>
  </div>
<?php
      
    //─────────────────────Prüfung─────────────────────
    if($_GET["post"] == 1){
      $lastid = $_COOKIE["last"];
      $lastcurrent = mysqli_query($dbw, "SELECT * FROM words WHERE `id` = '$lastid'");
      $lastrow = mysqli_fetch_assoc($lastcurrent);
      
      echo "<div>";
      $newlevel = $lastrow["level"];
      if($_POST["wort"] == $lastrow["name"]){
        //─────────────────────richtig─────────────────────
        echo "Richtig das Wort war " . $lastrow["name"] . ".";
        if($lastrow["level"] < 7){
          $newlevel = $newlevel + 1;
          $sql = "UPDATE words SET level='$newlevel' WHERE id='$lastid'";
          mysqli_query($dbw, $sql);
        }
      }else{
        //─────────────────────falsch─────────────────────
        echo "Falsch! Das Wort war " . $lastrow['name'] . ".";
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
?>
  <a href="./index.php"><button>Weiter</button></a>
  </div>
<?php
    }elseif($_GET["post"] == "fail"){
      
      //Platzhalter Github Issue
      
    }else{
      
      //─────────────────────Zufallswahl─────────────────────
      //4660 einträge
      //date-calc
      $time = date("Ymd");
      
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
        echo "Du hast bereits alle Vokabeln für heute abgearbeitet. Der $nextday ist dein nächster Lerntag.";
      }else{
        setcookie("last", $row['id'], 0);
      
      //─────────────────────Antwort─────────────────────
?>
        <div>
            <video height="480" width="640" controls loop autoplay>
        <source src="./video/<?php echo $row['link']; ?>.mp4" type="video/mp4">
      </video>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?post=1">
                <br>Vokabellevel: <?php echo $row['level']; ?>
                <br><textarea name="wort" placeholder="Antwort" required rows="4" cols="40">
<?php if($row['level'] == 0){echo $row['name'];} ?>
</textarea><br><br>
                <input type="submit" name="login" value="Senden" />
            </form>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?post=fail">
                <br><br><br><input type="submit" name="fail" value="Sollte das Wort komisch sein, oder das Video nicht laden klicke hier." />
            </form>
        </div>
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
      $_SESSION['login_user'] = $_POST['uname'];
      echo "Bitte warten, du wirst automatisch weitergeleitet.";
      header("Refresh:2");
    }else{
?>
            <div style="">Benutzername oder Passwort falsch!<br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="text" name="uname" placeholder="Benutzername" required /><br><br>
                    <input type="password" name="pass" placeholder="Passwort" required /><br><br>
                    <input type="submit" name="login" value="Senden" />
                </form>
            </div>
<?php
    }
  }else{
?>
                <div style=""><br>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="text" name="uname" placeholder="Benutzername" required /><br><br>
                        <input type="password" name="pass" placeholder="Passwort" required /><br><br>
                        <input type="submit" name="login" value="Senden" />
                    </form>
                </div>
<?php
  } 
?>
</body>

</html>
