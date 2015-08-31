<?php 

class LoginController extends BaseController {

	//Login View Return
	function login()
	{
		Session::forget('entry_date');
		Session::forget('student_no');
		return View::make('login');
	}

	//Authenticating
	function proceed()
	{
		$credentials = array('username'=>Input::get('username'),
							'password'=>Input::get('password'));

		if(Auth::attempt($credentials))
		{	
			//Dashboard
			return Redirect::intended('dashboard');
		}
		else
		{	
			//Not Authenticated
			return Redirect::to('login')->with('message','Invalid Credentials, Please login again');
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
	 	return Redirect::to('login')->with('message', 'You have successfully logged out');
	}

}
