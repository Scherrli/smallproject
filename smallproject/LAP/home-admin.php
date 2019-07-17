<?php 
    session_start();
    include('scripts/inactivity.php');

    if($_SESSION)
    {
        echo $_SERVER['HTTP_USER_AGENT'];
        include("scripts/db-connection.php");
        $userBereich = $_SESSION['session_bereich'];  

        function getInteressenten()
        {
            
            
            //$rowCount = mysqli_num_rows($result);
        }
        


        function getMakler()
        {
            include("scripts/db-connection.php");
           
            //$rowCount2 = mysqli_num_rows($result);
        }

    }
    else
    {
        header("Location: index.html");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/home-admin.css" />
    <script src="main.js"></script>
</head>
<body>
    <!-- Top -->
    <section class="top">
        <h1>Willkommen <?php echo $_SESSION['session_user'] ?>!</h1>
    </section>

    <!-- Navigation -->
    <header>
        <nav>
            <ul>
                <li><a href="registerUser.php">Benutzer hinzufügen</a></li>
            </ul>
        </nav>
    </header>
   
    <!-- Display existing users-->
    <section class="content">
        <h2>Interessenten</h2>

         <!-- Anzeigen der Immobilien die dem Nutzer zugeordnet sind -->
         <?php
            $sql = "SELECT * FROM interessenten";
            $result = mysqli_query($connection, $sql);
            while($row = $result->fetch_assoc())
            {
        ?>
        <div class="card">
            <div class="image"></div>
            <div class="description">
                <h3><?php echo $row['Vorname'] . " " . $row['Nachname']?></h3>
                <p><?php echo $row['Benutzername'] ?></p>
                <div class="line"></div>
                <p><?php echo $row['PLZ'] . ", Freigeschaltet für folgenden Bereich: " . $row['Bereich_ID'] ?></p>
            </div>
            <div class="end">
                <a href="#">Bearbeiten</a>
            </div>
        </div>
        <?php 
            }
        ?>
    </section>

    <section class="content2">
        <h2>Makler</h2>


         <!-- Anzeigen der Immobilien die dem Nutzer zugeordnet sind -->
         <?php
            $sql2 = "SELECT * FROM makler";
            $result2 = mysqli_query($connection, $sql2);
            while($row2 = $result2->fetch_assoc())
            {
        ?>
        <div class="card">
            <div class="image"></div>
            <div class="description">
                <h3><?php echo $row2['Vorname'] . " " . $row2['Nachname']?></h3>
                <p><?php echo $row2['Benutzername'] ?></p>
                <div class="line"></div>
                <p><?php 
                        if($row2['Admin-Rechte'] == 1)
                        {
                            echo "Administrator" . ", Zugeteilt für folgenden Bereich: " . $row2['Bereich_ID'];
                        }
                        else
                        {
                            echo "kein Admin" . ", Zugeteilt für folgenden Bereich: " . $row2['Bereich_ID'];
                        }
                        
                    ?>
                </p>
            </div>
            <div class="end">
                <a href="#">Bearbeiten</a>
            </div>
        </div>
        <?php 
            }
        ?>
    </section>

    <!-- Logout -->
    <form action="scripts/logout.php" method="POST">
        <input type="submit" name="logout" value="Logout" />
    </form>
</body>
</html>