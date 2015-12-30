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

  $sql = "UPDATE votes SET yes = 0, no = 0";
  if ($conn->query($sql) === TRUE) {
    echo "start";
  } else {
    echo "Fail: " . $conn->error;
  }

  $conn->close();
?>
