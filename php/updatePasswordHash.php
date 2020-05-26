<?php
$dbconn = new mysqli('localhost', 'root', '', 'pet_supplies');
if ($dbconn->connect_error) {
    die($dbconn->connect_error);
}

$dbconn->set_charset('utf8');


$oldPword = 'dMan124830';
$username = 'DaVeyyBoii';
$newPword = password_hash($oldPword, PASSWORD_DEFAULT);

$query = "UPDATE user_account SET pword = 'john' WHERE username = 'DaVeyyBoii";
$result = $dbconn->query($query);



?>