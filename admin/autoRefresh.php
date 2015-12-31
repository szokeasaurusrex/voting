<?php
  $servername = "localhost";
  $username = "voting";
  $password = "";
  $dbName = "voting";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbName);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM voters";
  $result = $conn->query($sql);
  $voters = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      array_push($voters, $row["name"]);
    }
  }
  echo json_encode($voters);
  $conn->close();
?>
