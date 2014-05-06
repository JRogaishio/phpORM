<?php 

class user extends orm {
	
	public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
	public $name = array("orm"=>true, "datatype"=>"varchar", "length"=>16, "field"=>"name");
	public $salt = array("orm"=>true, "datatype"=>"varchar", "length"=>64, "field"=>"salt");
	public $password = array("orm"=>true, "datatype"=>"varchar", "length"=>128, "field"=>"password");
	
	public function setId($val) {$this->set($this->id, $val);}
	public function setName($val) {$this->set($this->name, $val);}
	public function setSalt($val) {$this->set($this->salt, $val);}
	public function setPassword($val) {$this->set($this->password, $val);}
	
	public function getId($val) {$this->get($this->id);}
	public function getName($val) {$this->get($this->name);}
	public function getSalt($val) {$this->get($this->salt);}
	public function getPassword($val) {$this->get($this->password);}
	
}

?>
