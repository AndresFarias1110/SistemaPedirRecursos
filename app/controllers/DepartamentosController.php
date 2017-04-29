<?php 

class DepartamentosController extends BaseController{

	public function index(){
		$dptos = Depto::all();
		return View::make('departamentos.index', [
				'depto' => $dptos
			]);
	}

	public function create(){
		$responsables = Responsable::all();
		return View::make('departamentos.create', [
			'resposables' => $responsables
		]);
	}
	public function store(){
		$input = Input::all();

		$departamento = new Depto;
		$departamento->departamento = $input['departamento'];
		$departamento->responsable_id = $input['listResp'];
		$departamento->save();

		return Redirect::route('departamentos.index');
	}

	public function destroy($id)
	{
		Depto::find($id)->delete();

		return Redirect::route('departamentos.index');
	}

	public function edit($id)
	{
		$dto = Depto::find($id);

		if (is_null($dto))
		{
			return Redirect::route('departamentos.index');
		}

		return View::make('departamentos.edit', compact('departamento'));
	}

	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Accione::$rules);

		if ($validation->passes())
		{
			$accione = Depto::find($id);
			$accione->update($input);

			return Redirect::route('departamentos.show', $id);
		}

		return Redirect::route('departamentos.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'Ocurrio un error.');
	}

}

 