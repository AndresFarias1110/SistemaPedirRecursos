<?php

class HomeController extends BaseController {

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

	public function getIndex()
	{
		//$idprof = Auth::user()->responsable->id;
		$partidas = Partida::all();

		$usuarios = Responsable::all();
		$metas = Meta::all();
		$depto = Depto::all();
		$accion = Accione::all();
		$ejercicios = Ejercicio::orderBy('anio', 'desc')->get();
		return View::make('admin.home',[
				'metas' => $metas,
				'ejercicios' => $ejercicios,
				'departamentos' => $depto,
				'acciones' => $accion,
				'partidas' => $partidas,
				'usuarios' => $usuarios
			]);
	}

	public function getHome()
	{
		return "hola desde getHome";
		//return View::make('admin.home');
	}

	public function postAgregarAccion(){
		Session::put('pestania', Input::get('pestania'));

		$acciones = Input::get('accion'); 
		$deptos = Input::get('depatamentos_acciones');
		$meta = Meta::find(Input::get('metaAccion'));

		$hoja = Hoja::find(Input::get('hoja_id2'));

		if(is_null($hoja)) {
			Session::flash('msg', ['type' => 'warning', 'title' => 'Cuidado', 'msg' => 'No se encontro la hoja seleccionada']);
			return Redirect::back();
		}

		foreach($hoja->hojasDeptos as $hd) {
			foreach($deptos as $dpto_id) {
				if ($hd->id_departamento == $dpto_id) {
					// $hd->attach($aciones);
					// $hd->acciones()->attach($aciones);
					foreach ($acciones as $accion_id) {
						$result = $hd->acciones()->find($accion_id);
						if(is_null($result)) {
							$hd->acciones()->attach($accion_id);
						}
					}
				}
			}
		}

	return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'Se agregaron las acciones.']);
/*
		$hojasdepartamentos  = Hojasdepartamento::find(Input::get('hoja_id2'));
		$accion = Accione::find(Input::get('accion'));

		if(!is_null($meta) && !is_null($hojasdepartamentos) && !is_null($accion)){
			$hojasdepartamentos->acciones()->attach($accion);
			return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'Se agregaron todos los deptos.']);
		}*/
		return Redirect::back()->with('msg', ['type' => 'warning', 'title' => 'Cuidado', 'message' => 'No se encontro la meta seleccionada.']);
	}

	public function postAgregarHoja()
	{
		Session::put('pestania', Input::get('pestania'));

		$departamentos_id = Input::get('cat_departamentos_id'); // Areglo
		$meta = Meta::find(Input::get('meta'));
		$hoja = Hoja::find(Input::get('hoja_id'));

		if(!is_null($meta) && !is_null($hoja))
		{
			$meta->departamentos()->attach($departamentos_id);
			$hoja->departamentos()->attach($departamentos_id);
			/*
			foreach($departamentos_id as $depto_id)
			{
				$depto = Departamento::find($depto_id);
				if(!is_null($depto))
				{
					//$depto->pivot->save($depto);
					foreach($meta->departamentos as $d)
					{

					}
				}
			}
			*/
			return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'Se agregaron todos los deptos.']);
		}
		return Redirect::back()->with('msg', ['type' => 'warning', 'title' => 'Cuidado', 'message' => 'No se encontro la meta seleccionada.']);
		/*
		foreach($meta->departamentos as $depto)
		{
			echo $depto->pivot->save([
				'metas_id' => $meta->id,
				'cat_departamentos_id' => $depto->id
				]);
		}
		*/
	}

	public function postPoa(){
		Session::put('pestania', Input::get('pestania'));
		$inputs = Input::all();
		$partidas = Input::get('listPartida');

		//return var_dump($inputs['listPartida']);
		
		foreach ($partidas as $partida) {
			# code...
			$poa = new Poa;
			$poa ->hoja_id = $inputs['hoja'];
			$poa ->meta_id = $inputs['listMeta'];
			$poa ->departamento_id = $inputs['listDptos'];
			$poa ->partida_id = $partida;
			//$poa ->descripcion = $inputs['descripcion'];
			$poa ->monto = $inputs['monto'];

			$poa->save();

			//return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'POA agregado.']);
				
		}
		/*
		$poa = new Poa;
		$poa ->hoja_id = $inputs['hoja'];
		$poa ->meta_id = $inputs['listMeta'];
		$poa ->departamento_id = $inputs['listDptos'];
		$poa ->partida_id = $inputs['listPartida'];
		$poa ->descripcion = $inputs['descripcion'];
		$poa ->monto = $inputs['monto'];

		$poa ->save();*/

		return Redirect::back()->with('msg', ['type' => 'success', 'title' => 'Alta', 'message' => 'POA agregado.']);
		
	}
}
