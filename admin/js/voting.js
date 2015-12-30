app.controller("voting", function ($scope) {
  $scope.voting = false;
  $scope.votingStatus = "";
  $scope.btn_action = "Start";
  $scope.yes_votes = 0;
  $scope.no_votes = 0;
  $scope.updateVotingStatus = function(response) {
    if (response == "start") {
      $scope.votingStatus = "Voting in progress";
    } else {
      $scope.votingStatus = response;
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
