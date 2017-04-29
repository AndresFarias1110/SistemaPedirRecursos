<?php

class EjerciciosController extends BaseController {

	/**
	 * Ejercicio Repository
	 *
	 * @var Ejercicio
	 */
	protected $ejercicio;

	public function __construct(Ejercicio $ejercicio)
	{
		$this->ejercicio = $ejercicio;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ejercicios = $this->ejercicio->all();

		return View::make('ejercicios.index', compact('ejercicios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ejercicios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Ejercicio::$rules);

		if ($validation->passes())
		{
			$this->ejercicio->create($input);

			return Redirect::route('ejercicios.index');
		}

		return Redirect::route('ejercicios.create')
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
		$ejercicio = $this->ejercicio->findOrFail($id);

		return View::make('ejercicios.show', compact('ejercicio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ejercicio = $this->ejercicio->find($id);

		if (is_null($ejercicio))
		{
			return Redirect::route('ejercicios.index');
		}

		return View::make('ejercicios.edit', compact('ejercicio'));
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
		$validation = Validator::make($input, Ejercicio::$rules);

		if ($validation->passes())
		{
			$ejercicio = $this->ejercicio->find($id);
			$ejercicio->update($input);

			return Redirect::route('ejercicios.show', $id);
		}

		return Redirect::route('ejercicios.edit', $id)
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
		$this->ejercicio->find($id)->delete();

		return Redirect::route('ejercicios.index');
	}

}
