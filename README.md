phpORM
======

What is phpORM?
--------------
phpORM is a simple ORM data mapping object for PHP objects. It allows you to define variables that will automatically create database tables, save data, update data and can be loaded back into an object.

How do I use it?
--------------
There are 3 parts to the setup:
- Include the orm.php class

- Create your object and extend the orm object

- Create your properties in the below format (indexs explained below):


`protected $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);`

`protected $username = array("orm"=>true, "datatype"=>"varchar", "length"=>64, "field"=>"username");`

You can then call the below methods of your object to perform various ORM functions:
- $obj->persist()
Persist the object to the database. This will save your object as a database table using the object name as the table name.

- $obj->save()
Save the object as a records in the database. If there are no ORM variables which are primary keys and have a value, the object will be saved as a new records. If an ID is set with a primary key variable, the object will be updated in the database.

- $obj->load(ID HERE)
Loads an object from the database into all the ORM fields of your class.

ORM Variables
--------------
`protected $id = array("orm"=>true, "datatype"=>"int", "length"=>16, "field"=>"id", "primary"=>true);`
The above is an example of an ORM variable. Below are the keys explained:
- orm: This is used to identify this field as an ORM field and to be persisted in the database
- datatype: This is the MySQL datatype you want this field to be persisted as
- length:(optional) This is the MySQL datatype length if applicable.
- field: This is the field name in MySQL that you would like this variable to be saved as. This MUST match the variable name.
- primary:(optional) Include this variable and set as true if you would like this field to be used as the primary key

