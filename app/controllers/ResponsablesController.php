<?php

class ResponsablesController extends BaseController {

	/**
	 * Responsable Repository
	 *
	 * @var Responsable
	 */
	protected $responsable;

	public function __construct(Responsable $responsable)
	{
		$this->responsable = $responsable;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$responsables = $this->responsable->all();

		return View::make('responsables.index', compact('responsables'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('responsables.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Responsable::$rules);

		if ($validation->passes())
		{
			//$this->responsable->create($input);
			$responsable = new Responsable;
			$responsable->profesion = $input['profesion'];
			$responsable->nombre = $input['nombre'];
			$responsable->app = $input['app'];
			$responsable->apm = $input['apm'];

			$responsable->save();

			$usuario = new Usuario;
			$usuario->nombre = $input['usuario'];
			$usuario->pass_temp = str_random(4);// $input['password'];
			$usuario->id_responsable = $responsable->id;
			$usuario->admin = false;

			$usuario->save();

			return Redirect::route('responsables.index');
		}

		return Redirect::route('responsables.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$responsable = $this->responsable->findOrFail($id);

		return View::make('responsables.show', compact('responsable'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$responsable = $this->responsable->find($id);

		if (is_null($responsable))
		{
			return Redirect::route('responsables.index');
		}

		return View::make('responsables.edit', compact('responsable'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::except('_token', 'profesion'), '_method');
		$validation = Validator::make($input, Responsable::$rules);

		if ($validation->passes())
		{
			$responsable = $this->responsable->find($id);
			$responsable->update($input);

			return Redirect::route('responsables.show', $id);
		}

		return Redirect::route('responsables.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->responsable->find($id)->delete();

		return Redirect::route('responsables.index');
	}

}
