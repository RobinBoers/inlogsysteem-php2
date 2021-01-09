<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Ingelogd</title>
</head>
<body>
    <header>
        <h1>Robin's Website</h1>
        <nav>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='over-mij.php'>Over mij</a></li>
            </ul>
        </nav>
    </header>
    <?php 

        session_start();
        if(!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
        }

        if($_SESSION['login'] == true) { ?>

            <h1>Je bent ingelogd, <?php echo $_SESSION['name']; ?></h1>
            

            <?php
                $accounttype = $_SESSION['type'];

                if($accounttype == 0) {
                    echo "<p>Accounttype: User</p>";
                } 
                elseif($accounttype == 1) {
                    echo "<p>Accounttype: VIP</p>";
                }
                elseif($accounttype == 2) {
                    echo "<p>Accounttype: Admin</p>";
                } 

                if($accounttype == 1 || $accounttype == 2) {
                    echo "<p><a href='view-accounts.php'>Accounts beheren</a></p>";
                }
            ?>

            <a href="logout.php">Uitloggen</a>

        <?php } else {
            header("Location: inloggen.php");
        }
    ?>
</body>
</html>