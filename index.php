<?php
include_once("models/entity/orm.php");
include_once("models/entity/user.php");

echo "Hello World<br />";

$user = new user();
$retVal = $user->persist();
echo $retVal;
//print_r($variables["id"]);

?>