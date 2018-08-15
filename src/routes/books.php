<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Get All Books
$app->get('/api/book',function(Request $request, Response $response){
	$sql =  "select * from book";

	try {
		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$book = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($book);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});



//Get Single Book
$app->get('/api/book/{id}',function(Request $request, Response $response){
	$id =  $request->getAttribute('id');
	$sql =  "select * from book where bookid ='$id'";
	try {
		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$book = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db   = null;
		echo json_encode($book);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});

//Get Query Book
$app->get('/api/book/query/{search_query}',function(Request $request, Response $response){
	$search_query =  $request->getAttribute('search_query');
	$sql =  "select * from book where name like '%$search_query%' or publisher like '%$search_query%' or slogan like '%$search_query%'";
	try {
		$db = new db();

		//Connnect
		$db = $db->connect();

		$stmt = $db->query($sql);
		$book = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db   = null;
		echo json_encode($book);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});


//Get Single Book Publisher
$app->get('/api/book/publisher/{publisher}',function(Request $request, Response $response){
	$publisher =  $request->getAttribute('publisher');
	$sql =  "select * from book where publisher = '$publisher'";
	try {
		$db = new db();

		//Connnect
		$db = $db->connect();
		$stmt = $db->query($sql);
		$book = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db   = null;
		echo json_encode($book);
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});



//Delete Single Book Publisher
$app->delete('/api/book/delete/{id}',function(Request $request, Response $response){
	$id =  $request->getAttribute('id');
	$sql =  "delete from book where bookid = '$id'";
	try {
		$db = new db();

		//Connnect
		$db = $db->connect();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		$db   = null;
		$message = [];
		$message['info']['text'] = 'Book Deleted';
		echo json_encode($message);
		
	} catch (PDOException $e) {
		$message = [];
		$message['error']['text'] = $e->getMessage();
		echo json_encode($message);
	}
});








