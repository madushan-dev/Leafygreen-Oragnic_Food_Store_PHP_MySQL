<?php
    #Starting session
    session_start();

    #Clearing all session variables
    session_unset();
    session_destroy();

    echo("<h2>You have been logged out! </h2><br><p>Redirecting to home page...</p><script>window.location.href = './index.php';</script>");
?>