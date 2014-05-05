<?php 

 class orm {
 	private $table = null;
 	private $conn = null;
 	
 	public function __construct() {
 		$this->table = get_class($this);
 	}
 	
 	public function load($id) {
 		/*foreach(get_object_vars($this) as $var) {
 			if(is_array($var) && isset($var['orm']) && $var['orm'] == true) {
 				if(isset($var['primary']) && $var['primary'] == true && isset($var['value']) && $var['value'] != "") {
 					$primary = $var['field'];
 					$primaryIndex = $var['value'];
 				}
 			}
 		}*/
 	}
 	
 	public function save() {
 		$primary = null;
 		$primaryIndex = null;
 		
 		$sql = "";
 		$field = "";
 		$value = "";
 		foreach(get_object_vars($this) as $var) {
 			if(is_array($var) && isset($var['orm']) && $var['orm'] == true) {
 				if(isset($var['primary']) && $var['primary'] == true && isset($var['value']) && $var['value'] != "") {
 					$primary = $var['field'];
 					$primaryIndex = $var['value'];
 				}
 			}
 		}
 		
 		//If there is a primary key, you are updating
 		if($primary != null) {
 			$sql = "UPDATE " . $this->table . " ";
 		} else {
 			//Insert since we dont have a key
 			$sql = "INSERT INTO " . $this->table . " ";
 		}
 		
 		foreach(get_object_vars($this) as $var) {
 			if(is_array($var) && isset($var['orm']) && $var['orm'] == true && isset($var['value'])) {
 				//Only build an insert / update for non-primary key fields
 				if(!isset($var['primary'])) {
			 		//If there is a primary key, you are updating
			 		if($primary != null) {
			 			if($value != "")
			 				$value .= ", ";
			 			
			 			$value .= " SET " . $var['field'] . "=" . $this->sqlWrap($var['value'], $var['datatype']);
			 		} else {
			 		//Insert since we dont have a key	
			 			
			 			if($field != "")
			 				$field .= ", ";
			 			if($value != "")
			 				$value .= ", ";
			 			
			 			$field .= $var['field'];
			 			$value .= $this->sqlWrap($var['value'], $var['datatype']);
			 		}
 				}
 			}
 		}
 		if($primary != null)
 			$sql .= $value . " WHERE " . $primary . "=" . $primaryIndex;
 		else 
 			$sql .= "(" . $field . ") VALUES (" . $value . ")";
 		
 		return $sql;
 	}
 	
 	private function sqlWrap($val, $type) {
 		$wrappedTypes = array("CHAR", "VARCHAR", "TEXT", "TINYTEXT");
 		
 		if(in_array(strtoupper($type), $wrappedTypes) == true) {
 			$val = "'" . $val . "'";
 		}
 		
 		return $val;
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
