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

  $ballot = $_REQUEST["ballot"];
  if ($ballot == "yes") {
    $sql = "UPDATE votes SET yes = yes + 1";
  } else if ($ballot == "no"){
    $sql = "UPDATE votes SET no = no + 1";
  }
  $success = $conn->query($sql);
  if ($success === TRUE) {
    echo "success";
  } else {
    echo "fail";
  }
  $conn->close();
?>
