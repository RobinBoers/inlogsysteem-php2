<link rel="stylesheet" href="main.css">
<?php
    session_start();

    include "connection.php";

    if((isset($_POST['name']) && isset($_POST['pswd'])) && ($_POST['name'] !== "" && $_POST['pswd'] !== "")) {
        $username = strip_tags($_POST['name']);
        $pass = strip_tags($_POST['pswd']);

        $username = $conn->real_escape_string($username);
        $password= $conn->real_escape_string($pass);

        $checkForOldAccount = "SELECT * FROM users WHERE name = '$username'";

        $check = $conn->query($checkForOldAccount);
        
        if($check->num_rows > 0) {
            echo "Er bestaat al een account met die naam.";
        } else {

            // Maak het account

            $sql = "INSERT INTO users (id, name, password, type) VALUES (NULL, '$username', '$password', 0)";

            $result = $conn->query($sql);

            echo $result;

            echo "Je account is aangemaakt, als extra beveiliging moet je nog wel een keer inloggen. <a href='inloggen.php'>Inloggen</a>";

        }
    } else {
        echo "<p>Vul correcte gegevens in!</p>
        <p><a href='aanmelden.php'>Probeer opnieuw</a>";
    }
?>