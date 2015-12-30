app.controller("voter", function($scope) {
  $scope.vote = function (ballot) {
    data = {
      ballot: "";
    };
    data.ballot = ballot;
    $.get("vote.php", data, function(response) {
      if (response == "success") {
        alert("You're vote was successfully processed.");
      } else {
        alert("Error: You're vote could not be processed correctly.");
      }
    }, "text");
  };
});
