var app = angular.module("atc_app", []);
app.controller("controller", function($scope, $http) {
    $scope.IsVisible = false;

    $scope.ShowHide = function(){
            $scope.IsVisible = true;
        }
    $scope.flighttypes=["1.Emergency","2.VIP","3.Passenger","4.Cargo"];
    $scope.flightsizes=["1.Large","2.Small"];
    $scope.btnName = "Enqueue";
    $scope.enqueue = function() {
        if ($scope.id == null) {
            alert("Enter Your Flight ID");
        } else if ($scope.type == null) {
            alert("Enter Your Flight Type");
        } else if ($scope.size == null) {
            alert("Enter Your Flight Size");
        } else {
            $http.post(
                "enqueue.php", {
                    'id': $scope.id,
                    'type': $scope.type,
                    'size': $scope.size,
                    'btnName': $scope.btnName
                }
            ).success(function(data) {
                alert(data);
                $scope.id = null;
                $scope.type = null;
                $scope.size = null;
                $scope.btnName = "Enqueue";
                $scope.show_data();
            });
        }
    }
    $scope.show_data = function() {
        $http.get("display.php")
            .success(function(data) {
                $scope.fdata = data;
            });
    }
    $scope.update_enqueue = function(id, type, size) {
        $scope.id = id;
        $scope.type = type;
        $scope.size = size;
        $scope.btnName = "Modify-Enqueue";
    }
    $scope.dequeue = function(id) {
        if (confirm("Are you sure you want to dequeue?")) {
            $http.post("dequeue.php", {
                    'id': id
                })
                .success(function(data) {
                    alert(data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
    $scope.exit = function() {
        if (confirm("Are you sure you want to exit ATC?")) {
            $http.post("dequeueall.php", {
                    
                })
                .success(function(data) {
                    alert(data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
});
