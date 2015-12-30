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
  function getVotes($ballot) {
    $sql = "SELECT * FROM votes";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $votes_string = $data[$ballot];
    return intval($votes_string);
  }
  function vote($ballot, $votes) {
    $sql = "UPDATE votes SET " + $ballot + " = " + (string)$votes;
    return $conn->query($sql);
  }
  $ballot = $_REQUEST["ballot"];
  $votes_to_insert = getVotes($ballot) + 1;
  $success = vote($ballot, $votes_to_insert);
  if ($success === TRUE) {
    echo "success";
  } else {
    echo "fail";
  }
?>
