
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
	$stmt = $mysqli->prepare("SELECT userName, userPass FROM websiteUsers WHERE  userName=? and userPass=? ");
	if (! $stmt ) {
    	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	$userQuery = "agazor";
	$passQuery = "1234";

	/* Bind Prepared statement */
	if (!$stmt->bind_param("ss", $userInsert, $passInsert )) {
    	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	/* Get a result set of the query */
	if ( $stmt->execute() ) { 
		// if the user and passwords are correct
    	echo "<br> Username: $userQuery Password: $passQuery <br>";
	}else{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	echo "<br>OK";
?>