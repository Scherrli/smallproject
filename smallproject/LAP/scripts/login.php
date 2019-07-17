<?php 
    session_start();
    
    if(isset($_POST['submit']))
    {
        include('db-connection.php');

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

            $sql = "SELECT * FROM interessenten WHERE Benutzername = '$username'";
            $result = mysqli_query($connection, $sql);
            $rowCount = mysqli_num_rows($result);

            if($rowCount < 1)
            {
                $sql = "SELECT * FROM makler WHERE Benutzername = '$username'";
                $result = mysqli_query($connection, $sql);
                $rowCount2 = mysqli_num_rows($result);

                if($rowCount2 < 1)
                {
                    header("Location: ../index.html");
                    exit();
                }
                else
                {
                    if($row = mysqli_fetch_assoc($result))
                    {
                        $hashedPW = password_verify($password, $row['Passwort']);

                        if($hashedPW == false)
                        {
                            header("Location: ../index.html");
                            exit();
                        }
                        else
                        {
                            $_SESSION['session_id'] = $row['ID'];
                            $_SESSION['session_user'] = $row['Benutzername'];
                            $_SESSION['session_rights'] = $row['Admin-Rechte'];
                            $_SESSION['session_bereich'] = $row['Bereich_ID'];
                            $_SESSION['session_typ'] = "makler";
                            $_SESSION['last_login_timestamp'] = time();

                            if($_SESSION['session_rights'] == 1) 
                            {
                                header("Location: ../home-admin.php");
                                exit();
                            }
                            else 
                            {
                                header("Location: ../home.php");
                                //HOME-MAKLER to update Documents...
                                exit();
                            }
                        }
                    }
                }
            }
            else
            {
                if($row = mysqli_fetch_assoc($result))
                {
                    $hashedPW = password_verify($password, $row['Passwort']);

                    if($hashedPW == false)
                    {
                        header("Location: ../index.html");
                        exit();
                    }
                    else
                    {
                        $_SESSION['session_id'] = $row['ID'];
                        $_SESSION['session_user'] = $row['Benutzername'];
                        $_SESSION['session_bereich'] = $row['Bereich_ID'];
                        $_SESSION['session_typ'] = "interessent";
                        $_SESSION['last_login_timestamp'] = time();

                        header("Location: ../home.php");
                        exit();
                    }
                }
            }
        }
?>