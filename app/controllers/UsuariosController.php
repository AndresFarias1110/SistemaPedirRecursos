<?php

class UsuariosController extends BaseController{

	public function getIndex(){

		$responsables= Responsable::all();

		return View::make('responsables.user',[
				'responsables' => $responsables
			]);
	}

	public function postAgregarUsuario(){
		$idresp = Input::get('resp');
		$usuarios = Input::get('usuario');
		$pass_T = Input::get('pass_t');
	}
}


