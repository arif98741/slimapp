<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Get All Customers
$app->get('/api/customers',function(Request $request, Response $response){
	$sql =  "select * from customers";

	try {
		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($customers);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});


//Get Single Customer
$app->get('/api/customer/{id}',function(Request $request, Response $response){
	$id = $request->getAttribute('id');
	$sql =  "select * from customers where id ='$id'";
	$message = [];

	try {
		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$row = $stmt->rowCount(PDO::FETCH_OBJ);
		if ($row == 0) {
			
			$message['error']['text'] = 'No Customer Found';
			echo json_encode($message);
		}else{
			$customer = $stmt->fetchAll(PDO::FETCH_OBJ);
			echo json_encode($customer);
		}
		$db = null;
		
	} catch (PDOException $e) {
		
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});




//Add Customer
$app->post('/api/customer/add',function(Request $request, Response $response){
	$first_name = $request->getParam('first_name');
	$last_name  = $request->getParam('last_name');
	$phone      = $request->getParam('phone');
	$email      = $request->getParam('email');
	$address    = $request->getParam('address');
	$city       = $request->getParam('city');
	$state      = $request->getParam('state');

	$sql =  "insert into customers (first_name,last_name, phone,email,address,city,state) values(:first_name,:last_name,:phone,:email,:address,:city,:state)";

	try {
		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':first_name',  $first_name);
		$stmt->bindParam(':last_name',  $last_name);
		$stmt->bindParam(':phone',  $phone);
		$stmt->bindParam(':email',  $email);
		$stmt->bindParam(':address',  $address);
		$stmt->bindParam(':city',  $city);
		$stmt->bindParam(':state',  $state); 
		$stmt->execute();

		$message['notice']['text'] = 'Customer Added Successfully';
		
		$db = null;
		echo json_encode($message);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});



//Update Customer
$app->put('/api/customer/update/{id}',function(Request $request, Response $response){
	$id 		= $request->getAttribute('id');
	$first_name = $request->getParam('first_name');
	$last_name  = $request->getParam('last_name');
	$phone      = $request->getParam('phone');
	$email      = $request->getParam('email');
	$address    = $request->getParam('address');
	$city       = $request->getParam('city');
	$state      = $request->getParam('state');

	
	$sql =  "update customers set 
		first_name = :first_name,
		last_name  = :last_name,
		phone	   = :phone,
		email      = :email,
		address    = :address,
		city 	   = :city,
		state      = :state where id= :id";

	try {

		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':first_name',  $first_name);
		$stmt->bindParam(':last_name',  $last_name);
		$stmt->bindParam(':phone',  $phone);
		$stmt->bindParam(':email',  $email);
		$stmt->bindParam(':address',  $address);
		$stmt->bindParam(':city',  $city);
		$stmt->bindParam(':state',  $state); 
		$stmt->bindParam(':id',  $id); 

		$stmt->execute();
		$message['notice']['text'] = 'Customer Updated Successfully';
		
		$db = null;
		echo json_encode($message);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});




//Delete Customer
$app->delete('/api/customer/delete/{id}',function(Request $request, Response $response){
	$id 		= $request->getAttribute('id');

	$sql =  "delete from customers  where id= :id";

	try {

		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();

		$message['notice']['text'] = 'Customer Deleted Successfully';
		
		$db = null;
		echo json_encode($message);

	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});




