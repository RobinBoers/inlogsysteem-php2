<link rel="stylesheet" href="main.css">
<h1>Accounts</h1>
<ul>
<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        $_SESSION['login'] = false;
    }

    include "connection.php";

    if($_SESSION['login'] == true) {
        // Ga verder

        if($_SESSION['type'] == 1 || $_SESSION['type'] == 2) {
            $sql = "SELECT id, name, type FROM users";

            $result = $conn->query($sql);

            while($row = $result->fetch_object()) {

                echo('<li>');
                echo($row->name);
                
                if($_SESSION['type'] == 2) {
                    echo(" - <a href='delete-account.php?id=".$row->id."'>Delete</a>");
                }

                echo('</li>');
            }
        } else {
            echo "Je hebt admin of VIP rechten nodig om accounts te kunnen zien.";
        }

    } else {
        echo "Je bent niet ingelogd, je kan hier inloggen: <a href='inloggen.php'>Inloggen</a>";
    }

?>
</ul>
