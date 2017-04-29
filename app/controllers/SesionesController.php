<?php
class SesionesController extends BaseController {

	public function getLogin()
	{
		$msg = Session::get('msg');
		return View::make('sesiones.login', [
			'msg' => $msg
			]);
	}

	public function postLogin()
	{
		$us = Usuario::where('nombre', Input::get('nombre'))->first();
		if(!is_null($us))
		{
			if(is_null($us->pass_temp))
			{
				if(Hash::check(Input::get('password'), $us->password))
				{
					Auth::login($us);
				}
			} else if($us->pass_temp === Input::get('password'))
			{
				Auth::login($us);
			}
		}
		if (Auth::check())
		{
			return Redirect::route('home');
		}
		Session::flash('msg', ['type' => 'warning', 'title' => 'Cuidado!', 'message' => 'Datos incorrectos.']);
		return Redirect::back()->withInput();
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}