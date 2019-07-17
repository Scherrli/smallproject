<?php 
    session_start();
    include('scripts/inactivity.php');
    
    if($_SESSION)
    {
        echo $_SERVER['HTTP_USER_AGENT'];
        include("scripts/db-connection.php");

        $userBereich = $_SESSION['session_bereich'];
        $sql = "SELECT * FROM immobilien WHERE Bereich_ID = '$userBereich'";
        $result = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($result);

        if($rowCount < 1)
        {

        }
        else
        {
            
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
    <link rel="stylesheet" type="text/css" media="screen" href="styles/home.css" />
</head>
<body>
    <section class="top">
        <h1>Willkommen <?php echo $_SESSION['session_user'] ?>!</h1>

    </section>


    <section class="content">
        <h2>Immobilien</h2>

       <!-- Anzeigen der Immobilien die dem Nutzer zugeordnet sind -->
        <?php
            while($row = $result->fetch_assoc())
            {
        ?>
        <div class="card">
            <div class="image"></div>
            <div class="description">
                <h2><?php echo $row['Titel'] ?></h2>
                <p><?php echo $row['Groesse'] ?> m², <?php echo $row['Lage'] ?></p>
                <div class="line"></div>
                <p class="price">
                    <?php 
                        if($userBereich == 1)
                        { 
                            echo "Kaufpreis: " .$row['Preis'] . "€"; 
                        }
                        else
                        {
                            echo $row['Preis'] . "€ monatl. Miete"; 
                        }
                    ?>
                </p>
            </div>
            <div class="end">
                <?php
                $filename = $row['Dokumente'];

                if($_SESSION['session_typ'] == "makler") {
                    echo "<form action='scripts/upload.php' method='post' enctype='multipart/form-data'>";
                    //echo "Info-File hochladen:";
                    echo "<input type='text' hidden='hidden' name='filename' value='$filename'>";
                    echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
                    echo "<input type='submit' value='Upload Info-File' name='submit'>";
                    echo "</form>";
                }

                if($_SESSION['session_typ'] == "interessent") {
                    $filename = $row['Dokumente'];
    
                    echo "<a href='files/".$filename."' download='".$filename."'>Download</a>";
                }
                ?>
                
            </div>
        </div>
        <?php 
            }
        ?>
    </section>

    <!-- <div class="fileUpload">
                <?php
                    // if($_SESSION['session_typ'] == "makler") 
                    // {
                    //     echo "<form action='scripts/upload.php' method='post' enctype='multipart/form-data'>";
                    //     echo "Info-File hochladen:";
                    //     echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
                    //     echo "<input type='submit' value='Upload Info-File' name='submit'>";
                    //     echo "</form>";
                    // }
                ?>
    </div> -->


    <section class="bottom">
        <!-- LOGOUT -->
        <form action="scripts/logout.php" method="POST">
            <input type="submit" name="logout" value="Logout" />
        </form>
    </section>
</body>
</html>