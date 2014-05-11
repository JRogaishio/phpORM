<?php 

class user extends orm {
	
	//Various arrays to store ORM data. The variable name MUST match the ORM field name
	public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
	public $username = array("orm"=>true, "datatype"=>"varchar", "length"=>16, "field"=>"username");
	public $salt = array("orm"=>true, "datatype"=>"varchar", "length"=>64, "field"=>"salt");
	public $password = array("orm"=>true, "datatype"=>"varchar", "length"=>128, "field"=>"password");
	
	//Methods to set ORM values
	public function setId($val) {$this->set($this->id, $val);}
	public function setUsername($val) {$this->set($this->username, $val);}
	public function setSalt($val) {$this->set($this->salt, $val);}
	//public function setPassword($val) {$this->set($this->password, $val);}
	
	//Methods to retrieve ORM values
	public function getId() {return $this->get($this->id);}
	public function getUsername() {return $this->get($this->username);}
	public function getSalt() {return $this->get($this->salt);}
	//public function getPassword() {return $this->get($this->password);}
	
}

?>
