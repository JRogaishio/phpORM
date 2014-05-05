<?php
include_once("models/entity/orm.php");
include_once("models/entity/user.php");

echo "<h1>Object Table Creating</h1>";
$user = new user();
$retVal = $user->persist();
echo $retVal;

echo "<h1>Object Saving / Updating</h1>";
$user->setId(1);
$user->setName("username here");
$user->setSalt("salt");
$user->setPassword("password");

$retVal = $user->save();
echo $retVal;

?>