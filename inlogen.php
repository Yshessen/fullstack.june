<?php


  //Include database connection file
  include 'database/Database.php';
 
  if (isset($_POST['knop'])){
    $username = $_POST['username'];
    // Normal Password
    $pass = $_POST['password'];
    //database connection
    $query1 = "SELECT * FROM Acounts WHERE AcountName='$username'";
        $stmt = $conn->prepare($query) or die ("Error 1.");
        $stmt->execute() or die ('error 2.');
    //verifing
    if(password_verify($pass, $row["AcountPassword"]) == true){
        //cookies opslaan en terug naar homepage
        

    }else{
        //fouten inlog gegevens
        
    }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdracht04</title>
</head>
<body>
    <?php if (!isset($_POST['knop'])) { ?>
        <form class="group-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label class="group-form">username:</label> <input class="group-form" type="txt" name="username" placeholder="username"><br>
            <label class="group-form">password:</label><input class="group-form" type="password" name="wachtwoord" placeholder="wachtwoord"><br>
            <input type="submit" name="knop" value="VERSTUUR">
        </form>
        <?php
    }else {
        if (!isset($_POST['username']) OR empty($_POST['username'])){
            header("location: " .$_SERVER['PHP_SELF']);
        }if (!isset($_POST['wachtwoord']) OR empty($_POST['wachtwoord'])){
            header("location: " .$_SERVER['PHP_SELF']);
        }

        // if (check_credentials($username, $wachtwoord)){
        //     echo "placeholder to log in and get cookies";
        // }else{
        //     exit("Acess Denied!");
        // }
    }



    ?>
</body>
</html>