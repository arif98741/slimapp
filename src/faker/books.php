<?php 
	
	require '../../vendor\fzaninotto\faker\src\autoload.php';
	require '../config/db.php';
	$db = new db();

	$generator = \Faker\Factory::create();
	$name 	   = $generator->text(20)  ;

	for ($i = 0; $i < 5 ; $i++) {
		$sql = "insert into book (name, publisher) values(:name, :publisher)";
		$stmt = $db->connect()->prepare($sql);
		$stmt->bindValue(":name",ucwords($generator->text(20)));
		$stmt->bindValue(":publisher",$generator->name);
		$stmt->execute();
	}

	echo "generated ".$i." data";

?>