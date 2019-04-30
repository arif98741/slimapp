<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
session_start();

$app->get('/api',function(){
	$host = $_SERVER['REMOTE_ADDR'];
	$session_id  = session_id();
	$message = array(
		'info' => 'JSON API',
		'version' => '3.0.12',
		'dev_version' => '4.1.0',
		'client_host' => $host,
		'session_id' => $session_id,
		'api_generate_key' => "http://slimapp/api/key/generate",
		'server' => array(
			'bd' => ['Asulia','Savar','Dhaka'],
			'singapore' => ['China Town']
		),
		'machine' => ['NgInx','Apache'],
		'developer' => array(
			'Bangladesh' => array(
				array(
					'Name' 			=>  'Ariful Islam',
					'git' 			=>  'arif98741',
					'twitter' 		=>  'arif98741',
					'stackoverflow' =>  'https://stackoverflow.com/users/6463182/ariful-islam',
				),array(
					'Name' 			=>  'Shamim Al-Deen',
					'git' 			=>  'shamimaldeen',
					// 'twitter' =>  'kristina1236',
					// 'stackoverflow' =>  'kristina1236'
				)
			)
		)
	);

	echo json_encode($message);
});

?>