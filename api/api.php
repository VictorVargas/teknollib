<?php
	include('../tools/connection.php');

	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
          header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
          header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

      exit(0);
  }

  $postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);
		$name = $request->name;
		$email = $request->email;
		$comment = $request->comment;

		if ($name != "" && $email != "" && $comment != "") {
			$sql = "INSERT INTO contact (name, email, comment) VALUES ('$name','$email','$comment');";
      $mysqli->query($sql);
		}
		else {
			echo "Uno o más datos están vacíos";
		}
	}
	else {
		echo "Algo Salió mal!";
	}
?>
