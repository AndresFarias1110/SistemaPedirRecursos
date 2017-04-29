<?php

class AccionesController extends BaseController {

	/**
	 * Accione Repository
	 *
	 * @var Accione
	 */
	protected $accione;

	public function __construct(Accione $accione)
	{
		$this->accione = $accione;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$acciones = $this->accione->all();

		return View::make('acciones.index', compact('acciones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('acciones.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Accione::$rules);

		if ($validation->passes())
		{
			$this->accione->create($input);

			return Redirect::route('acciones.index');
		}

		return Redirect::route('acciones.create')
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
		$accione = $this->accione->findOrFail($id);

		return View::make('acciones.show', compact('accione'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$accione = $this->accione->find($id);

		if (is_null($accione))
		{
			return Redirect::route('acciones.index');
		}

		return View::make('acciones.edit', compact('accione'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Accione::$rules);

		if ($validation->passes())
		{
			$accione = $this->accione->find($id);
			$accione->update($input);

			return Redirect::route('acciones.show', $id);
		}

		return Redirect::route('acciones.edit', $id)
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
		$this->accione->find($id)->delete();

		return Redirect::route('acciones.index');
	}

}
