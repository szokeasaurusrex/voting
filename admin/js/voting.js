app.controller("voting", function ($scope) {
  $scope.voting = false;
  $scope.btn_action = "Start";
  $scope.yes_votes = 0;
  $scope.no_votes = 0;
  $scope.btnClick = function () {
    if ($scope.voting == false) {
      $scope.voting = true;
      $scope.btn_action = "Stop";
    } else {
      $scope.voting = false;
      $scope.btn_action = "Start";
    }
  };
});
