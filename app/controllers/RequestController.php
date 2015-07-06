<?php

use Guzzle\Http\Client;
use Guzzle\Plugin\Cookie\CookiePlugin;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

class RequestController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function postLogin()
	{
		parse_str(file_get_contents('php://input'), $_POST);
		parse_str(json_decode( parse_str(file_get_contents('php://input'), $_POST), TRUE ));

		$client = new GuzzleHttp\Client();
		$url = Config::get('valor.url').'login';
		$cookieJar = new \GuzzleHttp\Cookie\CookieJar();

	    $res = $client->post($url,[
	    		'cookies' => $cookieJar,
	    		'body' => [
		        'admin_id' => Request::input('admin_id'),
		        'password' => Request::input('password')
			    ],
	    ]);


	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

		// $contents = $res->getHeader('Set-Cookie');
		// $temp = explode('laravel_session=', $contents);
		// $temp = $temp[1];
		// $temp = explode(';', $temp);
		// $session_id = $temp[0];

		$session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

		return $res;

	}

	public function postForgottenPassword()
	{
		parse_str(file_get_contents('php://input'), $_POST);
		parse_str(json_decode( parse_str(file_get_contents('php://input'), $_POST), TRUE ));

		$client = new GuzzleHttp\Client();
		$url = Config::get('valor.url').'forgottenpassword';
		$cookieJar = new \GuzzleHttp\Cookie\CookieJar();
	    $res = $client->post($url, [
	        	'cookies' => $cookieJar,
	        	'body' => ['email_address' => Request::input('email_address')
	        	],
	    ]);

	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

			// $contents = $res->getHeader('Set-Cookie');
	    // echo $contents;
	    // $temp = explode('PHPSESSID=', $contents);
			// $temp = explode('laravel_session=', $contents);
			// $temp = $temp[1];
			// $temp = explode(';', $temp);
			// $session_id = $temp[0];

		$session_id = Session::getId();
	    // echo 'Session-Id: '.$session_id;
	    // echo '</br>';
		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

		return $res;
	}

	public function getMembers()
	{
		$client = new GuzzleHttp\Client();
		$url = Config::get('valor.url').'all-members';
	    $res = $client->get($url,[
			   'cookies' => true
	    ]);

	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

			// $contents = $res->getHeader('Set-Cookie');
			// $temp = explode('laravel_session=', $contents);
			// $temp = $temp[1];
			// $temp = explode(';', $temp);
			// $session_id = $temp[0];
	    $session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

	    return $res;

	}

	public function postRemoveMember()
	{
		parse_str(file_get_contents('php://input'), $_POST);
		parse_str(json_decode( parse_str(file_get_contents('php://input'), $_POST), TRUE ));

		$client = new GuzzleHttp\Client();
		$url = Config::get('valor.url').'remove-member';
		$cookieJar = new \GuzzleHttp\Cookie\CookieJar();
	    $res = $client->post($url, [
	        	'cookies' => $cookieJar,
	        	'body' => ['id' => Request::input('id'),
	        				'reason' => Request::input('reason')
	        	],

	    ]);

	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

			// $contents = $res->getHeader('Set-Cookie');
			// $temp = explode('laravel_session=', $contents);
			// $temp = $temp[1];
			// $temp = explode(';', $temp);
			// $session_id = $temp[0];
	    $session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

		return $res;
	}

	public function getJoinRequests()
	{
		$client = new GuzzleHttp\Client();
		$url = Config::get('valor.url').'join-requests';
		$cookieJar = new \GuzzleHttp\Cookie\CookieJar();
	    $res = $client->get($url, [
	        'cookies' => $cookieJar
	    ]);

	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

		// $contents = $res->getHeader('Set-Cookie');
		// $temp = explode('laravel_session=', $contents);
		// $temp = $temp[1];
		// $temp = explode(';', $temp);
		// $session_id = $temp[0];
		$session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

	    return $res;
	}

	public function postAddRejectMember()
	{
		parse_str(file_get_contents('php://input'), $_POST);
		parse_str(json_decode( parse_str(file_get_contents('php://input'), $_POST), TRUE ));

	    $client = new GuzzleHttp\Client();
	    $url = Config::get('valor.url').'join-requests';
	    $cookieJar = new \GuzzleHttp\Cookie\CookieJar();
	    $res = $client->post( $url , [
        	'cookies' => $cookieJar,
	       	'body' => ['accept' => Request::input('accept'),
	       				'reject' => Request::input('reject')
        	],

	    ]);

	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

			$contents = $res->getHeader('Set-Cookie');
			$temp = explode('laravel_session=', $contents);
			$temp = $temp[1];
			$temp = explode(';', $temp);
			$session_id = $temp[0];

		$session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

	    return $res;
	}

	public function getSettings()
	{
		$client = new GuzzleHttp\Client();
		$url = Config::get('valor.url').'community-settings';
		$cookieJar = new \GuzzleHttp\Cookie\CookieJar();
	    $res = $client->get( $url, [
	    	'cookies' => $cookieJar
	    ]);

	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

		// $contents = $res->getHeader('Set-Cookie');
		// $temp = explode('laravel_session=', $contents);
		// $temp = $temp[1];
		// $temp = explode(';', $temp);
		// $session_id = $temp[0];
		$session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

	    return $res;
	}

	public function putSettings()
	{
		parse_str(file_get_contents('php://input'), $_POST);
		parse_str(json_decode( parse_str(file_get_contents('php://input'), $_POST), TRUE ));

	    $client = new GuzzleHttp\Client();
	    $url = Config::get('valor.url').'community-settings';
	    $cookieJar = new \GuzzleHttp\Cookie\CookieJar();
	    $res = $client->post( $url , [
	    	'cookies' => $cookieJar,
	    	'body' => ['color1' => Request::input('color1'),
	    				'color2' => Request::input('color2'),
	    				'color3' => 'zelena',
	    				'welcome_logo' => Request::input('welcome_logo'),
	    				'app_header' => Request::input('app_header'),
	    				'menu_header' => Request::input('menu_header')
	    	],

	    ]);


	    $res->removeHeader('HTTP/1.1');
	    $res->removeHeader('Host');
	    $res->removeHeader('Connection');
	    $res->removeHeader('X-Powered-By');

	    $res->removeHeader('Expires');
	    $res->removeHeader('Cache-Control');
	    $res->removeHeader('Pragma');
	    $res->removeHeader('Date');

	    $res->removeHeader('Server');
	    $res->removeHeader('Content-Length');

		// $contents = $res->getHeader('Set-Cookie');
		// $temp = explode('laravel_session=', $contents);
		// $temp = $temp[1];
		// $temp = explode(';', $temp);
		// $session_id = $temp[0];
		$session_id = Session::getId();

		$res->addHeader('Session-Id', $session_id);
		$res->removeHeader('Set-Cookie');

	    return $res;
	}

}