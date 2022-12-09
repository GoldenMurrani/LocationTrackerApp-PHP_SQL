<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_GET['magic']) || $_GET['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_GET['lat'], $_GET['lng']);

function process($lat, $lng) {
    $pdo = pdo_connect();
    $query = "SELECT id, name FROM GpsLocation WHERE ABS(lat-$lat)<=0.000045 AND ABS(lng-$lng)<=0.000045";
//    $query = "SELECT id, name FROM GpsLocation WHERE ABS(lat-$lat)<=0.000145 AND ABS(lng-$lng)<=0.000145";
    $rows = $pdo->query($query);
    if($row = $rows->fetch()) {
        // We found a valid location at the users position
//        echo '<gps status="yes" msg="check success" name="{$row['name']}" id="{$row['id']}" />';
        echo "<gps status='yes' msg='check success' name='{$row['name']}' id='{$row['id']}' />";
//        echo "<chess status='yes' msg='game found' gamestate = '{$row['gamestate']}' turn = '{$row['turn']}' />";
        exit;
    }
    echo '<gps status="no" msg="check error" />';
    exit;
}

