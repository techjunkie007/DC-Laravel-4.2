<?php 

class LoginController extends BaseController {

	//Login View Return
	function login()
	{
		//Flush Session if exists
		Session::flush();
		return View::make('login');
	}

	//Authenticating
	function proceed()
	{
		//Flush Session if exists
		Session::flush();
		$credentials = array('username'=>Input::get('username'),
							'password'=>Input::get('password'));

		if(Auth::attempt($credentials))
		{	
			//Dashboard
			return Redirect::to('dashboard');
		}
		else
		{	
			//Not Authenticated
			return "Not authenticated";
		}
	}

	//Logout User
	function logout()
	{	
		//Flush Session
		Session::flush();
	 	//Auth Logout
	 	Auth::logout();
	 	//Redirect to
	 	return Redirect::to('login')->with('message', 'You Logged Out. Log In Again');
	}

}
