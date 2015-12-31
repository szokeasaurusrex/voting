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
  $name = (string) $_REQUEST["name"];
  $sql = "SELECT * FROM voters";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $voted = false;
    while ($row = $result->fetch_assoc()) {
      if ($row["name"] == $name) {
        $voted = true;
        break;
      }
    }
  } else {
    $voted = false;
  }
  if ($voted === false) {
    $sql = "INSERT INTO voters VALUES ($name)";
    if ($conn->query($sql) !== TRUE) {
      echo "Fail: " . $conn->error;
    }
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
  } else {
    echo "revote";
  }
  $conn->close();
?>
