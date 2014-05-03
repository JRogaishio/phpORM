<?php
include_once("models/entity/orm.php");
include_once("models/entity/user.php");

echo "Hello World<br />";
s
$user = new user();
$user->persist();

//print_r($variables["id"]);

?>