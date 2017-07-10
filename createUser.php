
<?php  
	echo "_Hello world.";

	$servername = "localhost";
	$dbname = "agazor";
	$username = "test";
	$password = "test";

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	/* Prepared statement, stage 1: prepare */
	$stmt = $mysqli->prepare("INSERT INTO websiteUsers( userName, userPass) VALUES ( ? , ? )");
	if (! $stmt ) {
    	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	$userInsert = "agazor";
	$passInsert = "1234";

	/* Bind Prepared statement */
	if (!$stmt->bind_param("ss", $userInsert, $passInsert )) {
    	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	/* Execute the prepared Statement */
	if ( !$stmt->execute() ) {
    	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	echo "OK";
?>