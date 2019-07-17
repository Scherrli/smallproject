<?php
if (isset($_SESSION)) {
  // only if user is logged in perform this check
  if ((time() - $_SESSION['last_login_timestamp']) < 300) {
    
  } else {
    header("Location: logout.php");
    exit;
  }
}
?>