<?php 


	class RespUsuariosApiController extends BaseController{
		

		public function getUsuarios() {
			/*$usuarioForm = null;
			$usuarioBD = null;

			if (Hash::check($usuarioForm->password, $usuarioBD->pasword))
			{
			    Auth::login($usuarioBD);
			}*/
			return Responsable::join('usuarios', 'responsables.id', '=', 'usuarios.id_responsable')->where('usuarios.id', 1)->first();	
		}
		public function getResUsuario($id = 0){
			return Responsable::find($id)->usuario;
		}
	}

 ?>