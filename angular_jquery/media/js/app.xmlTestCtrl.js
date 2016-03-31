angularXML.controller('xmlTest', function($scope, $http){
        $http.get(testXML)  
        .success(function(response) {
        console.log(response) ;
        $scope.details = response.geonames;  
            });  
    });