<?php
include_once("config.php");
include_once("models/entity/orm.php");
include_once("models/entity/user.php");

$conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD) or die("Could not connect. " . mysqli_error());

//Create the database if it doesn't exist
$dbCreate = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`;";
$conn->query($dbCreate) OR DIE ("Could not build database!");

//Connect to our shiney new database
$conn->select_db(DB_NAME) or die("Could not select database. " . mysqli_error());




echo "<h1>Object Table Creating</h1>";
$user = new user();
$retVal = $user->persist();
echo $retVal;

echo "<h1>Object Updating</h1>";
$user = new user();
$user->setId(1);
$user->setName("username here");
$user->setSalt("salt");
$user->setPassword("password");
$retVal = $user->save();
echo $retVal;

echo "<h1>Object Saving</h1>";
$user = new user();
$user->setName("username here");
$user->setSalt("salt");
$user->setPassword("password");
$retVal = $user->save();
echo $retVal;


?>