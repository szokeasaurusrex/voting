app.controller("voter", function($scope) {
  if(!(sessionStorage.usr_name)) {
    $scope.usr_name_confirmed = false;
    $scope.usr_name = "";
  } else {
    $scope.usr_name_confirmed = true;
    $scope.usr_name = sessionStorage.usr_name;
  }
  $scope.processing = false;
  $scope.vote = function (ballot) {
    console.log($scope.processing);
    if ($scope.usr_name_confirmed === false) {
      var confirmation = prompt("Press OK to vote as " + $scope.usr_name);
      if (confirmation !== false) {
        return 0;
      }
      sesssionStorage.usr_name = $scope.usr_name;
      $scope.usr_name_confirmed = true;
    }
    if ($scope.processing === false) {
      $scope.processing = true;
      var data = {
        ballot: "",
        name: $scope.usr_name;
      };
      data.ballot = ballot;
      $.get("vote.php", data, function(response) {
        $scope.processing = false;
        if (response == "success") {
          alert("You're vote was successfully processed.");
        } else if (response == "revote") {
          alert("Error: You have already voted.");
        } else if (response == "no_voting") {
          alert("Error: Voting is not in progress.")
        } else {
          alert("Error: You're vote could not be processed correctly.");
        }
      }, "text");
    }
  };
});
