<?php 

class page extends orm {
	
	//Various arrays to store ORM data. The variable name MUST match the ORM field name
	public $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);
	public $title = array("orm"=>true, "datatype"=>"varchar", "length"=>64, "field"=>"title");
	public $authorId = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"authorId");
	public $created = array("orm"=>true, "datatype"=>"varchar", "length"=>128, "field"=>"created");
	public $content = array("orm"=>true, "datatype"=>"text", "field"=>"content");
	
}

?>
