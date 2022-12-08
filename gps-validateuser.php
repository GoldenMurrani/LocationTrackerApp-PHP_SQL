<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_GET['magic']) || $_GET['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_GET['user'], $_GET['pw']);

function process($user, $password) {
    $pdo = pdo_connect();
    $userQ = $pdo->quote($user);
    $query = "SELECT ID, Password from GpsUser where username=$userQ";
    $rows = $pdo->query($query);
    if($row = $rows->fetch()) {
        // We found the record in the database
        // Check the password
        if($row['Password'] != $password) {
            echo '<gps status="no" msg="password error" />';
            exit;
        }

        $id = $row['ID'];
        $status = "yes";
        $msg = "user is valid";

        //echo '<gps status="yes" id=\"$id\" msg="user is valid" />';
        echo "<gps status=\"$status\" id=\"$id\" msg=\"$msg\"/>\r\n";
        exit;
    }
    echo '<gps status="no" msg="user error" />';
    exit;

}
