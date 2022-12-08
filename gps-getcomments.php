<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_GET['magic']) || $_GET['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_GET['locId']);

function process($locId) {
    $pdo = pdo_connect();
    $query = "SELECT GpsUser.Username, GpsComment.comment FROM GpsUser JOIN GpsComment ON GpsUser.ID=GpsComment.user WHERE GpsComment.location=$locId;";
    $rows = $pdo->query($query);
    echo "<gps status=\"yes\">";
    foreach($rows as $row ) {
        $user = $row['Username'];
        $comment = $row['comment'];

        echo "<comment user=\"$user\" comment=\"$comment\" />\r\n";
    }
    echo "</gps>";

}
