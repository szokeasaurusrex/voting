app.controller("voting", function ($scope) {
  $scope.voting = false;
  $scope.voting_status = "";
  $scope.btn_action = "Start";
  $scope.yes_votes = 0;
  $scope.no_votes = 0;
  $scope.updateVotingStatus = function(response) {
    console.log("function")
    if (response == "start") {
      $scope.voting_status = "Voting in progress";
    } else {
      $scope.voting_status = response;
    }
  }
  $scope.btnClick = function () {
    if ($scope.voting == false) {
      $scope.voting = true;
      $scope.btn_action = "Stop";
      $.get("startVote.php", null, $scope.updateVotingStatus, "text");
    } else {
      $scope.voting = false;
      $scope.btn_action = "Start";
    }
  };
});
