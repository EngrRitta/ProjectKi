<?php
  //print_r($_GET);
  $projectID = $_GET['projectID'];
  $projectName = addslashes($_GET['projectName']);
  $date = $_GET['date'];
  $jobNumber = $_GET['jobNumber'];
  $customerName = addslashes($_GET['customerName']);
  $bomDescription = addslashes($_GET['bomDescription']);
  echo "Your project is " . $projectID . " Bye! <br>";


$servername = "localhost";
$username = "root";
$password = "secret";
$database_name="eng-projects";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql_statement= "INSERT INTO `projecttable` (`id`, `projectID`, `projectName`, `date`, `jobNumber`, `customerName`, `bomDescription`) VALUES(NULL, '$projectID', '$projectName', '$date', '$jobNumber', '$customerName', '$bomDescription')";

if (mysqli_query($connection, $sql_statement)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql_statement . "<br>" . mysqli_error($connection);
}
