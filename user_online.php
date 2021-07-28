<?php
if(isset($_SESSION['user'])){
 $sqlm=$dbh->prepare("SELECT uname FROM chatters WHERE uname=?");
 $sqlm->execute(array($_SESSION['user']));
 if($sqlm->rowCount()!=0){
  $sql=$dbh->prepare("UPDATE chatters SET seen=NOW() WHERE uname=?");
  $sql->execute(array($_SESSION['user']));
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters (uname,seen) VALUES (?,NOW())");
  $sql->execute(array($_SESSION['user']));
 }
}
/* Make sure the timezone on Database server and PHP server is same */
$sql=$dbh->prepare("SELECT * FROM chatters");
$sql->execute();
while($r=$sql->fetch()){
 $curtime=strtotime(date("Y-m-d H:i:s",strtotime('-25 seconds', time())));
 if(strtotime($r['seen']) < $curtime){
  $kql=$dbh->prepare("DELETE FROM chatters WHERE uname=?");
  $kql->execute(array($r['uname']));
 }
}
?>