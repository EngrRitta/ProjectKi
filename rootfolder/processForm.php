

<?php
  //print_r($_GET);
  $projectID = $_GET['projectID'];
  $projectName = addslashes($_GET['projectName']);
  $date = $_GET['date'];
  $jobNumber = $_GET['jobNumber'];
  $customerName = addslashes($_GET['customerName']);
  $bomDescription = addslashes($_GET['bomDescription']);



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
//echo "Connected successfully";

$sql_statement= "INSERT INTO `projecttable` (`id`, `projectID`, `projectName`, `date`, `jobNumber`, `customerName`, `bomDescription`) VALUES(NULL, '$projectID', '$projectName', '$date', '$jobNumber', '$customerName', '$bomDescription')";

if (mysqli_query($connection, $sql_statement)) {
    echo "<div class = 'ui message'> <div class='header'>" . "New project created successfully!" . "</div></div>";
} else {
    echo "Error: " . $sql_statement . "<br>" . mysqli_error($connection);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>
<body>
<a href="http://127.0.0.1"><button class="medium fluid ui orange button" id="newProjectButton">Return to Index</button></a>
<a href="projectlist.php"><button class="medium fluid ui orange button" id="newProjectButton">Go to Projects Menu</button></a>
    <div class = "ui message">
        <div class="header">
            <?php
            echo "Your project ID is " . $projectID . " Please open it from the projects menu. Bye! <br>";
            ?>
        </div>
    </div>
</body>
</html>
