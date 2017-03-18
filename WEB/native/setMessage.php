<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: origin, content-type, accept");
    header('Content-Type: application/json');

    $postdata = file_get_contents("php://input");
	$req = json_decode($postdata, true);

    $name = $req[name];
    $message = $req[message];

    require_once("auto_load.php");
    $res = Message::setMessage($name, $message);
    if ($res)
        echo json_encode(array(success => true));
    else
        echo json_encode(array(success => false));
?>
