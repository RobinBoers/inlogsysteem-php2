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

        if($_SESSION['type'] == 2) {

            if(isset($_GET['id'])) {
                $accountId = $_GET['id'];

                $sql = "DELETE FROM users WHERE id = $accountId";

                $result = $conn->query($sql);

                header("Location: view-accounts.php");
            } else {
                echo "Ongeldige link!";
            }
            
        } else {
            echo "Je hebt admin of VIP rechten nodig om accounts te kunnen zien.";
        }

    } else {
        echo "Je bent niet ingelogd, je kan hier inloggen: <a href='inloggen.php'>Inloggen</a>";
    }

?>
</ul>
