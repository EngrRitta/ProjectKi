<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>
<body>
<table class="ui inverted orange table">
  <thead>
  <tr>
    <th>Project ID</th>
    <th>Project Name</th>
    <th>Date</th>
    <th>Job Number</th>
    <th>Customer Name</th>
    <th>BOM Description</th>
  </tr>
  </thead>
    <tbody>
<?php
$requestedProject = $_GET['radioChoice'];
//print_r($requestedProject);
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
$sql = "SELECT * FROM projecttable WHERE projectID='$requestedProject';";;
$result = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>". $row['projectID'] . "</td>";
        echo "<td>" . $row['projectName'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['jobNumber'] . "</td>";
        echo "<td>" . $row['customerName'] . "</td>";
        echo "<td>" . $row['bomDescription'] . "</td>";
        echo "</tr>";

    }
}
?></tbody>
</table>
<a href="http://127.0.0.1"><button class="medium fluid ui orange button" id="newProjectButton">Return to Index</button></a>
</body>
</html>

