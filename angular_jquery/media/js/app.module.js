/**
	*  Module
	*
	* Description
	*/
	var angularXML 	= angular.module('angularXML', []);

	angularXML.config(['$httpProvider',function($httpProvider) {
			$httpProvider.defaults.useXDomain = true;
			delete $httpProvider.defaults.headers.common['X-Request-Width'];
			
		}
	]);
	
