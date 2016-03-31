

var xmlURL 	 	= "http://stellen-online.de/index.php/jobexport.html?scope=standard&consumer=feed_premium&username=standard&password=standard0815",
    // xmlLocal    = "http://127.0.0.1/test_projekte/xml_feed/angular_jquery/media/js/jobexport.html.xml";
	xmlLocal 	= "media/js/jobexport.html.xml";
    testXML     = "http://api.geonames.org/citiesJSON?north=44.1&south=-9.9&east=-22.4&west=55.2&lang=de&username=sibeeshvenu";


	angularXML.controller('MainCtrl', function ($scope, $http){

        $scope.predicate = '';
        $scope.reverse = true;
        $scope.filters = [];
		$scope.order = function(predicate) {
        $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
            $scope.predicate = predicate;
         };
		
        $scope.title = "ANGULAR geht!!!";
		$http.get(xmlLocal
                    ,{
                        
                        transformResponse: function (cnv) {
                            var x2js = new X2JS();
                            var aftCnv = x2js.xml_str2json(cnv);
                            return aftCnv;
                        }
                    }
            )
            .success(function (response) {
                console.log(response.jobs);
                $scope.details = response.jobs.job; //xml-Array = jobs -> job => siehe XML-Struktur

                // Filtern der XML-Daten
                // Königsteiner-Filter
                $scope.filterKoeag = function (xmlList){
                    return xmlList.companyname1 === 'KÖNIGSTEINER AGENTUR GmbH';  //xml-Value = companyname1 => siehe XML-Struktur 
                }
                
                angular.forEach($scope.details, function(val, keys){

                    if($scope.details.companyname1 === 'KÖNIGSTEINER AGENTUR GmbH'){

                        this.push(key + ': ' + val);
                    }
                }, $scope.filters);

        });
	});
    angularXML.controller('AppCtrl', function($scope) {
          $scope.items = [1,2,3,4,5];
          $scope.selected = [];
          $scope.toggle = function (item, list) {
            var idx = list.indexOf(item);
            if (idx > -1) list.splice(idx, 1);
            else list.push(item);
          };
          $scope.exists = function (item, list) {
            return list.indexOf(item) > -1;
          };
    });       