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
    $query = "select id, name from GpsLocation";
    $rows = $pdo->query($query);
    echo "<gps status=\"yes\">";
    foreach($rows as $row ) {
        $id = $row['id'];
        $name = $row['name'];

        echo "<location id=\"$id\" name=\"$name\" />\r\n";
    }
    echo "</gps>";

}