<?php 
	
	require '../../vendor\fzaninotto\faker\src\autoload.php';
	require '../config/db.php';
	$db = new db();

	$generator = \Faker\Factory::create('en_NZ');
	$name 	   = $generator->text(20)  ;

	for ($i = 0; $i < 5 ; $i++) {
		$sql = "insert into customers (first_name, last_name, phone, email, address, city, state) values(:first_name, :last_name, :phone, :email, :address, :city, :state)";
		$stmt = $db->connect()->prepare($sql);
		$stmt->bindValue(":first_name",$generator->firstName);
		$stmt->bindValue(":last_name",$generator->lastName);
		$stmt->bindValue(":phone",$generator->numberBetween($min = 69500000, $max = 99865225));
		$stmt->bindValue(":email",$generator->email);
		$stmt->bindValue(":address",$generator->address);
		$stmt->bindValue(":city",$generator->city);
		$stmt->bindValue(":state",$generator->state);

		$stmt->execute();
	}

	echo "generated ".$i." data";

?>