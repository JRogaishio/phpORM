<?php
include_once("config.php");
include_once("models/entity/orm.php");
include_once("models/entity/user.php");
include_once("models/entity/page.php");

$conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD) or die("Could not connect. " . mysqli_error());

//Create the database if it doesn't exist
$dbCreate = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`;";
$conn->query($dbCreate) OR DIE ("Could not build database!");

//Connect to our shiney new database
$conn->select_db(DB_NAME) or die("Could not select database. " . mysqli_error());


echo "<h1>Object Table Creating</h1>";
$page = new page($conn);
$retVal = $page->persist();
if($retVal) echo "Success!"; else echo "Failure";

//########################################################################

echo "<h1>Object Saving</h1>";
$page = new page($conn);
$page->setTitle("Home page");
$page->setCreated(date('Y-m-d H:i:s'));
$page->setContent("my page content here");
//$retVal = $page->save();
if($retVal) echo "Success!"; else echo "Failure";

//########################################################################

echo "<h1>Object List Loading</h1>";
$user = new user($conn);
$pageList = $user->loadList(1, "authorId", new page($conn));

foreach($pageList as $obj) {
	echo "<h2>" . $obj->getTitle() . "</h2>" . $obj->getCreated() . "<hr />";
	echo $obj->getContent() . "<br />";
	echo "<br /><hr />";
}

?>