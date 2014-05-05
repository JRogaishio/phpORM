<?php 

class user extends orm {
	
	public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
	public $name = array("orm"=>true, "datatype"=>"varchar", "length"=>16, "field"=>"name");
	public $salt = array("orm"=>true, "datatype"=>"varchar", "length"=>64, "field"=>"salt");
	public $password = array("orm"=>true, "datatype"=>"varchar", "length"=>128, "field"=>"password");
	
	public function setId($val) {$this->id['value'] = $val;}
	public function setName($val) {$this->name['value'] = $val;}
	public function setSalt($val) {$this->salt['value'] = $val;}
	public function setPassword($val) {$this->password['value'] = $val;}
	
}

?>
