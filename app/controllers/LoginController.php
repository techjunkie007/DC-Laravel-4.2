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
			return "Hello";

		}
		

    
	}

	function logout(){

	 Auth::logout();

	 return Redirect::to('login');
	}

}
