<?php
    $dbconn = new mysqli('localhost', 'root', '', 'pet_supplies');
    if ($dbconn->connect_error) {
        die($dbconn->connect_error);
    }

    $dbconn->set_charset('utf8');
    
?>