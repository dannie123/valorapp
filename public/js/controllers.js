'use strict';

var valorControllers = angular.module('valorControllers', ['valorServices']);

valorControllers.controller('LoginController', ['$scope', '$http', '$location', 'userData',
	function($scope, $http, $location, userData) {
		$scope.userCredentials = {};

		$scope.loginTry = function(userCredentials) {
			$http.post('http://valor.rossilabs.net:10101/software-nation/admin/login', userCredentials)
			// $http.post('/admin/login', {admin_id:userCredentials.admin_id,password:userCredentials.password})
			.success(function(data, status, headers, config)
			{
				console.log(data);
				if (data !== "INVALID_USER_OR_PASSWORD") 
				// if (data !== 'invalid admin_id/pass combo') 
				{
					$location.path('/dashboard');
					// window.location.href = '#dashboard';
					console.log('prosao if');
					userData.setUser(userCredentials);
					userData.setData(data);
				}
				else
					console.log('nije prosao if');
			})
			.error(function(data, status, headers, config)
			{
				console.log('error');
				console.log(data);
				console.log(status);
				console.log(headers);
				console.log(config);
			});
		};

		$scope.forgotPasswordAnimate = function() {
    		$(".login-form").animate({'top':'-26.04vw'},1000, function(){
    		$(".login-form-forg").animate({'left':'0'},1000);
    	});
		}
	}]);

valorControllers.controller('DashboardController', ['$scope', 'userData',
	function($scope, userData) {
		alert('usao u ovaj kontroler');
		$scope.user = {};
		$scope.user = userData.getUser();
		$scope.userData = userData.getData();
		console.log('dohvaceni podaci su');
		console.log($scope.user);
	}]);

valorControllers.controller('AdministratorsController', ['$scope', '$location', 'userData',
	function($scope, $location, userData) {

	}]);

valorControllers.controller('BrandingController', ['$scope', 'userData',
	function($scope, userData) {

	}]);

valorControllers.controller('MarketingController', ['$scope', 'userData',
	function($scope, userData) {

	}]);

valorControllers.controller('UsersController', ['$scope', 'userData',
	function($scope, userData) {

	}]);