<?php 

class LoginController extends BaseController {

	//Login view return
	function login(){


		return View::make('login');
	}

	function proceed(){

		$credential = array('username'=>Input::get('username'),
							'password'=>Input::get('password'));

		if(Auth::attempt($credential))
		{
			return View::make('dashboard');
		}
		else
		{
			return "Not authenticated";

		}
		

    
	}

	function logout(){

	 //Auth::logout();
	 Session::flush();

	 return Redirect::to('login');
	}

}
