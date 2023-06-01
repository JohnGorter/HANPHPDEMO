<?php

    echo <<<LOGOUT
    <form action="/logout.php" method="POST">
            <input type="submit" name="logout" value="logout">
    </form>
    LOGOUT;

?>