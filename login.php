<link rel="stylesheet" href="main.css">
<?php
    session_start();

    include "connection.php";

    if(isset($_POST['name']) && $_POST['name'] !== "") {
        $username = strip_tags($_POST['name']);
        $pass = strip_tags($_POST['pswd']);

        $username = $conn->real_escape_string($username);
        $password= $conn->real_escape_string($pass);

        $sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";

        $result = $conn->query($sql);

        if($result->num_rows === 1) {
            echo("Je bent ingelogd.");

            $_SESSION['login'] = true;

            while($row = $result->fetch_object()) {
                $_SESSION['name'] = $row->name;
                $_SESSION['id'] = $row->id;
                $_SESSION['type'] = $row->type;
            }

            header("Location: account.php");
        } else {
            echo("Er ging iets fout...<br>Zijn je inloggegevens correct?");
        }
    } else {
        echo "<p>Vul je inloggegevens in!</p>
        <p><a href='inloggen.php'>Probeer opnieuw</a>";
    }
?>