<?php 

 class orm {
 	private $table = null;
 	private $conn = null;
 	
 	function orm() {
 		echo "Called from ORM constructor";
 	}
 	
 	public function __construct() {
 		$this->table = get_class($this);
 	}
 	
 	public function save() {
 		$hasPrimary = false;
 		$sql = "";
 		$field = "";
 		$value = "";
 		foreach(get_object_vars($this) as $var) {
 			if(is_array($var) && isset($var['orm']) && $var['orm'] == true) {
 				if(isset($var['primary']) && $var['primary'] == true) {
 					$hasPrimary = true;
 				}
 			}
 		}
 		
 		//If there is a primary key, you are updating
 		if($hasPrimary == true) {
 			$sql = "UPDATE " . $this->table . " ";
 		} else {
 			//Insert since we dont have a key
 			$sql = "INSERT INTO " . $this->table . " (";
 		}
 		
 		foreach(get_object_vars($this) as $var) {
 			if(is_array($var) && isset($var['orm']) && $var['orm'] == true && isset($var['value'])) {
 				
		 		//If there is a primary key, you are updating
		 		if($hasPrimary == true) {
		 			$sql .= " SET " . $var['field'] . "=" . $var['value'];
		 		} else {
		 		//Insert since we dont have a key	
		 			
		 		}
 			}
 		}
 	}
 	
 	public function persist() {
 		$create = true;
 		$sql = "";
 		$field = "";
 		$pk = "";

 		//Table doesn't exist. Create it
 		$sql = "CREATE TABLE IF NOT EXISTS `" . $this->table . "` (";

 		foreach(get_object_vars($this) as $var) {
  			if(is_array($var) && isset($var['orm']) && $var['orm'] == true) {
  				if($field != "")
  					$field .= ', ';
  				
 				$field .= "`" . $var['field'] . "` " . $var['datatype'];
 				if(isset($var['length'])) {
 					$field .= "(" . $var['length'] . ")";
 				}
 				if(isset($var['primary']) && $var['primary'] == true) {
 					$field .= " NOT NULL AUTO_INCREMENT";
 					$pk .= $var['field'];;
 				} else {
 					$field .= " DEFAULT NULL";
 				}
 			}
 		}
 		
 		$sql .= $field;
 		
 		if($pk != "")
 			$sql .= ", PRIMARY KEY (`" . $pk . "`)";
 		
 		if($create)
 			$sql .= ");";
 		
 		return $sql;
 	}
 	
 }

?>
