<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_GET['magic']) || $_GET['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_GET['user'], $_GET['pw']);

function process($user, $password) {
    // Connect to the database
    $pdo = pdo_connect();
    $userQ = $pdo->quote($user);
    $query = "select Password from GpsUser where Username=$userQ";
    $rows = $pdo->query($query);
    if($row = $rows->fetch()) {
        // We found the record in the database
        // Check the password
        if($row['Password'] != $password) {
            echo '<gps status="no" msg="password error" />';
            exit;
        }
        echo '<gps status="yes" msg="user is valid" />';
        exit;
    }
    echo '<gps status="no" msg="user error" />';
    exit;

}