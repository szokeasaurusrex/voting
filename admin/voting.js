app.controller("voting", function ($scope) {
  $scope.voting = false;
  $scope.voting_status = "";
  $scope.btn_action = "Start";
  $scope.yes_votes = 0;
  $scope.no_votes = 0;
  $scope.btnClick = function () {
    if ($scope.voting == false) {
      $scope.voting = true;
      $scope.btn_action = "Stop";
      $.get("startVote.php", null, function(response) {
        console.log("function")
        if (response == "start") {
          $scope.voting_status = "Voting in progress";
        } else {
          $scope.voting_status = response;
        }
        $scope.$apply();
      }, "text");
    } else {
      $scope.voting = false;
      $scope.btn_action = "Start";
      $.get("getResults.php", null, function(result) {
        $scope.yes_votes = result.yes;
        $scope.no_votes = result.no;
        $scope.voting_status = "";
        $scope.$apply();
      }, "json");
    }
  };
});
