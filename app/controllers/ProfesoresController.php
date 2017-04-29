<?php

class ProfesoresController extends BaseController{

	public function postIndex(){
		$idprof = Auth::user()->responsable->id;
		$partidas = Partida::all();
		$dptos = Responsable::find($idprof)->departamentos;
		return View::make('profesores.home',[
				'dptos' => $dptos,
				'partidas' => $partidas
			]); 
	}
	
	public function getResposableDepartamentos($ida = 0){
		return Responsable::find($ida)->departamentos;
	}

	public function getPartidaDesc($id = 0){
		return Partida::find($id);
	}
	public function getHojaMeta($idm = 0){
		return Hoja::find($idm)->meta;
	}
	public function getHojaAcciones($idh, $idd){
		return Hojasdepartamento::where('id_hoja', $idh)->where('id_departamento', $idd)->first()->acciones;
		// return Hojasdepartamento::find($idh)->acciones;
	}
	public function getDescAccion($ida){
		return Accione::find($ida);
	}
	public function postGeneral(){
		$datos = Input::all();
		$fecha = $datos['fechaS'];

		$valores  = explode('/', $fecha);
		$fecha_s = $valores[2] . '/' . $valores[0] . '/' . $valores[1];
		

		
		$general = new General;
		$general->iddpto = $datos['listDptos'];
		$general->idm = $datos['listMeta'];
		$general->ida = $datos['listAccion'];
		$general->idp = $datos['listPartida'];
		$general->presupuesto = $datos['monto'];
		$general->clave_presupuestal = $datos['clavep'];
		$general->unidad = $datos['unidad'];
		$general->cantidad = $datos['cantidad'];
		$general->justificacion = $datos['txtJustificacion'];
		$general->fecha_s = $fecha_s;
		
		$general->save();

		return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'Se registraron lo datos !.']);	
	}

	public function getDtoHM($idd, $idh, $idm){

		$partidas = Poa::where('hoja_id', $idh)->where('meta_id', $idm)->where('departamento_id', $idd)->get();

		return $partidas;
	}
	
	public function getRequisicion() {

		$inputs = Input::all();
		$fecha = date('Y m d');
		$profesor = Auth::user()->responsable;
		$depto = Depto::find($inputs['idDpto'])->departamento;

		$requisicion = General::where(
		 	'clave_presupuestal', $inputs['clavep'])->
		 		where('iddpto', $inputs['idDepto'])->
		 		where('idm', $inputs['idMeta'])->first();

		if(!is_null($requisicion)){

			$accion = Accione::find($requisicion->ida)->descripcion;
		 	$fecha_s = $requisicion->fecha_s;

				$html = View::make('profesores.requesicion',[
				 'generales' => General::where(
				 	'clave_presupuestal', $inputs['clavep'])->
				 		where('iddpto', $inputs['idDepto'])->
				 		where('idm', $inputs['idMeta'])->get(),
				 'meta' => $inputs['descMeta'],
				 'fecha' => $fecha,
				 'fecha_s' => $fecha_s,
				 'profesor' => $profesor,
				 'depto' => $depto,
				 'accion' => $accion,
				 'urlp' => public_path()
				 ]);

		    	return PDF::load($html, 'A3', '')->download('Requesicion departamento'. $depto);
		}

		Session::flash('msg', ['type' => 'warning', 'title' => 'Cuidado', 'msg' => 'No se ha genertado la Requisicion']);
		return Redirect::back();    	
	}

	public function getPerfil(){
		$responsable = Auth::user()->responsable;
		$usuario = Auth::user();
		//return var_dump($usuario);

		return View::make('profesores.perfil', [
			'usuario' => $usuario,
			'responsable' => $responsable
		]);
	}

	public function postUsuario(){
		$inputs = Input::all();
		$usuario = Auth::user();

		$usuario->nombre = $inputs['usuario'];
		$usuario->pass_temp = $inputs['password'];

		$responsable = Auth::user()->responsable;

		$responsable->nombre = $inputs['nombre'];
		$responsable->app = $inputs['app'];
		$responsable->apm = $inputs['apm'];
		$responsable->profesion = $inputs['profesion'];

		$usuario->save();
		$responsable->save();

		return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'Se Guardaron los cambios !.']);		
	}

	public function getEliminarRequisicion() {

		

		$dptos = Auth::user()->responsable->departamentos;
		foreach ($dptos as $dpto) {
			# code...
			General::where('iddpto', $dpto->id)->delete();
		}
		
		return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Eliminacion', 'message' => 'requisiciones Eliminadas !.']);
	
	}
}