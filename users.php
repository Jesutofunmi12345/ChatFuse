<?php
include("config.php");
echo "<h2>Users</h2>";
$sql=$dbh->prepare("SELECT uname FROM chatters ORDER BY chatters_id");
$sql->execute();
while($r=$sql->fetch()){
 echo "<div class='user'>{$r['uname']}</div>";
}
?>