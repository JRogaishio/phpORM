<?php 

 class orm {
 	private $table = null;
 	private $conn = null;
 	
 	public function __construct() {
 		$this->table = get_class($this);
 		//echo "##" . get_class($this) . "##<br /><br />";
 		//$this->conn = $conn;
 	}
 	
 	//property name="accountID" ormtype="string" length="32" fieldtype="id" generator="uuid" 
 	//unsavedvalue="" default="";
 	
 	public function persist() {
 		$create = false;
 		$sql = "";
 		$field = "";
 		$pk = "";

 		//public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
 		//if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) {
 			//Table exists. Alter it to match
 			$sql = "ALTER TABLE " . $this->table;
 		//} else {
 			//Table doesn't exist. Create it
 			//$sql = "CREATE TABLE IF NOT EXISTS `" . $this->table . "` (";
 			//$create = true;
 		//}

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
