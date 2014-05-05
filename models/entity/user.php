<?php 

class user extends orm {
	
	public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
	public $name = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"name");
	public $salt = array("orm"=>true, "datatype"=>"varchar", "length"=>64, "field"=>"salt");
	public $password = array("orm"=>true, "datatype"=>"varchar", "length"=>128, "field"=>"password");
	

	
}

?>
