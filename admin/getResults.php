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

  $sql = "SELECT * FROM votes";
  $result = $conn->query($sql);
  $votes = $result->fetch_assoc();
  $sql = "SELECT * FROM voters";
  $result = $conn->query($sql);
  $voters = $result->fetch_assoc();
  $data = array("votes"=>$votes, "voters"=>$voters);
  echo json_encode($data);
  $conn->close();
?>
