app.factory('login', ['$http', function($http)
{
	return $http.post('http://valor.rossilabs.net:10101/software-nation/admin/login', userCredentials)
				.success(function(data, status, headers, config)
				{
					console.log('not error');
					console.log(data);
					console.log(status);
					console.log(headers);
					console.log(config);
				})
				.error(function(data, status, headers, config)
				{
					console.log('error');
					console.log(data);
					console.log(status);
					console.log(headers);
					console.log(config);
				});
}])