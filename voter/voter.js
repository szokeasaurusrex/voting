app.controller("voter", function($scope) {
  $scope.processing = false;
  $scope.vote = function (ballot) {
    console.log($scope.processing);
    if ($scope.processing === false) {
      $scope.processing = true;
      data = {
        ballot: ""
      };
      data.ballot = ballot;
      $.get("vote.php", data, function(response) {
        $scope.processing = false;
        if (response == "success") {
          alert("You're vote was successfully processed.");
        } else {
          alert("Error: You're vote could not be processed correctly.");
        }
      }, "text");
    }
  };
});
