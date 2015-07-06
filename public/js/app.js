var valorApp = angular.module('valorApp', [
	'ngRoute',
	'valorControllers'
	], function($interpolateProvider) {
		$interpolateProvider.startSymbol('<%');
		$interpolateProvider.endSymbol('%>');
	});

valorApp.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'partials/login.html',
				controller: 'LoginController'
			})
			 .when('/dashboard', {
			 	templateUrl: 'partials/dashboard.html',
			 	controller: 'DashboardController'
			 })
			 .when('/administrators', {
			 	templateUrl: 'partials/administrators.html',
			 	controller: 'AdministratorsController'
			 })
			 .when('/branding', {
			 	templateUrl: 'partials/branding.html',
			 	controller: 'BrandingController'
			 })
			 .when('/marketing_campains', {
			 	templateUrl: 'partials/marketing_campains.html',
			 	controller: 'MarketingController'
			 })
			 .when('/user_management', {
			 	templateUrl: 'partials/user_management.html',
			 	controller: 'UsersController'
			 })
			.otherwise({
				redirectTo: '/'
			});
	}])