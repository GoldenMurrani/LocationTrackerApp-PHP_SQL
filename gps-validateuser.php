<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';

if(!isset($_GET['magic']) || $_GET['magic'] != "NechAtHa6RuzeR8x") {
    echo '<gps status="no" msg="magic" />';
    exit;
}

process($_GET['user'], $_GET['pw'], $_GET['magic']);

function process($user, $password, $magic) {
    // Connect to the database
    $pdo = pdo_connect();
    $userid = getUser($pdo, $user, $password);

    echo '<gps status="yes" msg="user is valid" />';

}

/**
 * Ask the database for the user ID. If the user exists, the password
 * must match.
 * @param $pdo
 * @param $user
 * @param $password
 * @return $id
 */
function getUser($pdo, $user, $password) {
    // Does the user exist in the database?
    $userQ = $pdo->quote($user);
    $query = "SELECT id, password from chessuser where user=$userQ";

    $rows = $pdo->query($query);
    if($row = $rows->fetch()) {
        // We found the record in the database
        // Check the password
        if($row['password'] != $password) {
            echo '<gps status="no" msg="password error" />';
            exit;
        }
        return $row['id'];
    }

    echo '<gps status="no" msg="user error" />';
    exit;
}