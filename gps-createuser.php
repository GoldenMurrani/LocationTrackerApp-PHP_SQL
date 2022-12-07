<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_POST['magic']) || $_POST['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_POST['user'], $_POST['pw']);

function process($user, $password) {
    $pdo = pdo_connect();
    $userQ = $pdo->quote($user);
    $passwordQ = $pdo->quote($password);
    $query = "insert into GpsUser(Username, Password) values($userQ, $passwordQ)";
    if($pdo->exec($query)){
        echo '<gps status="yes" msg="user created" />';
        exit;
    }
    echo '<gps status="no" msg="user create failed" />';
    exit;

}