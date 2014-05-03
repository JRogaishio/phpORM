<?php 

class user extends orm {
	
	public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
	public $name = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"name");
	
	public function __construct() {
		
	}
		
}

?>
