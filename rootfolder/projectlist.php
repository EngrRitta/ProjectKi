<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Project</title>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>
<body>
  <p class="pinstructions">Select the project you wish to open.</p>
  <table class="ui orange compact celled definition table">
    <thead class ="full width">
    <tr>
      <th>select</th>
      <th>projectID</th>
      <th>projectName</th>
      <th>date</th>
      <th>jobNumber</th>
      <th>customerName</th>
      <th>bomDescription</th>
    </tr>
      </thead>
        <tbody>
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
      //echo "Connected successfully";
      $sql = "SELECT * FROM projecttable;";
      $result = mysqli_query($connection, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

          echo "<tr>";
          echo "<td class='collapsing'>". "<div class='ui radio checkbox'>" . "<input type  ='radio' name='radio'>" . "<label>" . "</label>" . "</div>" . "</td>";
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
      <tfoot class="full-width">
      <tr>
        <th></th>
        <th colspan="7">
          <div class="ui large orange button">
            <i class="user icon"></i> Open Project
          </div>

        </th>
      </tr>
      </tfoot>
  </table>
  <a href="http://127.0.0.1"><button class="medium fluid ui orange button" id="newProjectButton">Return to Index</button></a>
</body>
</html>
