<?php
// place holder log in information
//     $users = [
//         "piet@worldonline.nl" => "doetje123",
//         "klaas@carpets.nl" => "snoepje777",
//         "truushendriks@wegweg.nl" => "arkiearkie201"
//     ]
// ;

// $servername = "localhost";
// $dbname = "fullstack.opt";
// $usernamedb = "root";
// $passworddb = "";

// try {
//     $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $usernamedb, $passworddb);
//     //set PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     //echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection Failed Successfully:" . $e->getMessage()();
// }


// $query ="SELECT * FROM Acounts";
//         $stmt = $conn->prepare($query) or die ("Error 1.");
//         $stmt->execute() or die ('error 2.');

//         while ($row = $stmt->fetch()){
//             echo "<tr>";
//             echo "<td>". $row["idAcount"] ."</td>";
//             echo "<td>". $row["AcountName"] ."</td>";
//             echo "<td>". $row["AcountPassword"] ."</td>";
//             echo "<td>". $row["role"] ."</td>";
//             echo "</tr>";
//         }








    function check_credentials($username, $wachtwoord) {
        $servername = "localhost";
        $dbname = "id19138934_animelistodb";
        $usernamedb = "id19138934_animan";
        $passworddb = "d2n#Y_Kxs5m3F\1Y";
        try {
            $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $usernamedb, $passworddb);
            //set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection Failed Successfully:" . $e->getMessage()();
        }
        $query ="SELECT * FROM Acounts";
            $stmt = $conn->prepare($query) or die ("Error connecting 1.");
            $stmt->execute() or die ("error 2.");
        while ($row = $stmt->fetch()){
            foreach ($conn as $row["AcountName"] => $row["AcountPassword"]) {
                if ($row["AcountName"] == $username AND $row["AcountPassword"] == $wachtwoord){
                    return $row["idAcount"];
                }
            }
        }
        return false;
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
        //opslaan variables
        $username = $_POST['username'];
        $wachtwoord = $_POST['wachtwoord'];
        
        if (check_credentials($username, $wachtwoord)){
            echo "placeholder to log in and get cookies";
        }else{
            exit("Acess Denied!");
        }
    }



    ?>
</body>
</html>