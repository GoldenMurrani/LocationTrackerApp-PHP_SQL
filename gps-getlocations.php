<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_GET['magic']) || $_GET['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process();

function process() {
    $pdo = pdo_connect();
    $query = "select id, name, lat, lng from GpsLocation";
    $rows = $pdo->query($query);
    echo "<gps status=\"yes\">";
    foreach($rows as $row ) {
        $id = $row['id'];
        $name = $row['name'];
        $lat = $row['lat'];
        $lng = $row['lng'];

        echo "<location id=\"$id\" name=\"$name\" lat=\"$lat\" lng=\"$lng\"/>\r\n";
    }
    echo "</gps>";

}