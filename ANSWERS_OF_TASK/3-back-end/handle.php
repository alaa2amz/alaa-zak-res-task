<?php
#database conf
$dsn = "sqlite:".__DIR__."/mydb.sqlite";

/*
CREATE TABLE IF NOT EXISTS images (
	    image_id INTEGER PRIMARY KEY AUTOINCREMENT,
	    name TEXT NOT NULL,
	    mime_type   TEXT    NOT NULL,
	    image_blob         BLOB,
	    date_created TEXT NOT NULL
);
 */

$size_allowable=1*1024;
$size=$_FILES['image']['size'];
$type=$_FILES['image']['type'];

if($size>$size_allowable){
	echo "size is greater than $size_allowable bytes"
		throw Exception("too big image");
}

if(!preg_match($type,"/^image\/.*/")){
	echo "not image file"
		throw Exception("not accepted file");
}

$name= $_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file($tmp,__DIR__."/$name");

$fh = fopen($tmp, 'rb');

$dbh = new PDO($dsn);
$sql = "INSERT INTO images(name,mime_type,image_blob,date_created) "
	                . "VALUES(:name,:mime_type,:image_blob,:date_created)";
$stmt->bindParam(':mime_type', $type);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':image_blob', $fh, \PDO::PARAM_LOB);
$stmt->bindParam(':date_created', time());
$stmt->execute();

fclose($fh);
echo "image saved into database";
