<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voting</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body ng-app="votingApp" ng-controller="voting">
    <?php
      $servername = "localhost";
      $username = "voting";
      $password = "";

      // Create connection
      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
    ?>
    <div class="jumbotron">
      <div class="container">
        <div class="col-md-8">
          <h1>Voting</h1>
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary btn-lg" ng-click="btnClick()">
            <h1>{{ btn_action }} voting</h1>
          </button>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-4">
        <h2>Results</h2>
      </div>
      <div class="col-md-8">
        <h2>{{ yes_votes }} people voted yes</h2>
        <h2>{{ no_votes }} people voted no</h2>
      </div>
    </div>

    <!-- JS libraries -->
    <script src="jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="angular.min.js"></script>

    <script>
      var app = angular.module("votingApp", []);
    </script>
    <script src="js/voting.js"></script>
  </body>
</html>
