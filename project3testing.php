<?php
$title = "CSE476 proj2 Test Page";
//
//  The user and password below are those you used in your
//  android application.
//

$user = "test";
$pass = "test";
$lat = "test";
$long = "test";
$locid = "test";

$base_url = "https://webdev.cse.msu.edu/~kroskema/cse476/project3/"; // verify that this is the correct path to your web site
$magic = "NechAtHa6RuzeR8x";
?>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>
<h2>p2 Testing</h2>
<p>Paste the valid xml created to save a hatting in the input box below,
    then click the "Test create" Button. On the new page that appears use the
    browser "View page source" option to see the results.</p>

<form method="get" target="_blank" action="<?php echo $base_url; ?>gps-validateuser.php">
    <p>Userid: <input type="text" name="user" value="<?php echo $user;?>"/></p>
    <p>magic: <input type="text" name="magic" value="<?php echo $magic;?>"/></p>
    <p>Password: <input type="text" name="pw" value="<?php echo $pass;?>"/></p>
    <p><input type="submit" value="Test validate user" /></p>
</form>

<form method="post" target="_blank" action="<?php echo $base_url; ?>gps-createuser.php">
    <p>Userid: <input type="text" name="user" value="<?php echo $user;?>"/></p>
    <p>magic: <input type="text" name="magic" value="<?php echo $magic;?>"/></p>
    <p>Password: <input type="text" name="pw" value="<?php echo $pass;?>"/></p>
    <p><input type="submit" value="Test create user" /></p>
</form>

<form method="get" target="_blank" action="<?php echo $base_url; ?>gps-getlocations.php">
    <p>magic: <input type="text" name="magic" value="<?php echo $magic;?>"/></p>
    <p><input type="submit" value="Test get locations" /></p>
</form>

<form method="get" target="_blank" action="<?php echo $base_url; ?>gps-checkhere.php">
    <p>lat: <input type="text" name="lat" value="<?php echo $lat;?>"/></p>
    <p>magic: <input type="text" name="magic" value="<?php echo $magic;?>"/></p>
    <p>lng: <input type="text" name="lng" value="<?php echo $long;?>"/></p>
    <p><input type="submit" value="Test checkhere" /></p>
</form>

<form method="get" target="_blank" action="<?php echo $base_url; ?>gps-getcomments.php">
    <p>locid: <input type="text" name="locId" value="<?php echo $locid;?>"/></p>
    <p>magic: <input type="text" name="magic" value="<?php echo $magic;?>"/></p>
    <p><input type="submit" value="Test checkhere" /></p>
</form>

</body>
</html>