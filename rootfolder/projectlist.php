<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Project</title>
</head>
<body>
  <p class="pinstructions">Select the project you wish to open.</p>
  <table>
    <tr>
      <th>projectID</th>
      <th>projectName</th>
      <th>date</th>
      <th>jobNumber</th>
      <th>customerName</th>
      <th>bomDescription</th>
    </tr>
    <?php
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
    ?>
  </table>
</body>
</html>
