<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_POST['magic']) || $_POST['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_POST['userid'], $_POST['locationid'], $_POST['comment']);

function process($user, $location, $comment){
    $pdo = pdo_connect();
    $userQ = $pdo->quote($user);
    $locationQ = $pdo->quote($location);
    $commentQ = $pdo->quote($comment);
    $query = "insert into GpsComment(user, location, comment) values($userQ, $locationQ, $commentQ)";
    if($pdo->exec($query)){
        echo '<gps status="yes" msg="comment created" />';
        exit;
    }
    echo '<gps status="no" msg="comment create failed" />';
    exit;
}