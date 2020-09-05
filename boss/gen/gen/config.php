<?php

DEFINE("HOST", "localhost");
DEFINE("USERNAME", "root");
DEFINE("PASSWORD", "");
DEFINE("DB", "Chinikayya");

function getIn($stm){

	$conn = new mysqli(HOST, USERNAME, PASSWORD, DB);

	if($conn->connect_error){

		$conn = 0;

		return [$conn, $conn->connect_error];
	}

// 	$n_stm = mysqli_real_escape_string($conn, $stm);
// 		echo $stm."\n";
// 		echo $n_stm;

	$result = $conn->query($stm);

	if($result == TRUE){

		$conn->close();

			return [2, 'OK'];

	}else

		return [1, mysqli_error($conn)];

}

function getOut($stm){


	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

	if(mysqli_error($conn)){
		$conn = 0;
		return $conn;
		echo mysqli_error($conn) ;
	}

	//$n_stm = mysqli_real_escape_string($conn, $stm);

	if($result = mysqli_query($conn, $stm)){
		//var_dump($result);
		if(mysqli_num_rows($result) > 0){

			$output = [];
			while($row = mysqli_fetch_assoc($result)){
				array_push($output,$row);
			}

			mysqli_close($conn);

			return  ["result"=>$output,"count"=>$result->num_rows];

		}else{

		}
	}
		mysqli_close($conn);
		return 1;

}



function getOutSpecific($stm){


	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

	if(mysqli_error($conn)){
		$conn = 0;
		return $conn;
	}

	$result = mysqli_query($conn, $stm);

		$output = [];

		while ($row  = mysqli_fetch_assoc($result)){

			//array_push($row, $output);
			$output[] = $row;
		}

		return $output;

	mysqli_close($conn);



}




function check($field){

		$n_field = htmlspecialchars($field);
		$n_field = stripslashes($n_field);
			return $n_field;
}


?>
