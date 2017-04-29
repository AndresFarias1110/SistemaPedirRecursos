<?php

class MetasController extends BaseController {

	/**
	 * Meta Repository
	 *
	 * @var Meta
	 */
	protected $meta;

	public function __construct(Meta $meta)
	{
		$this->meta = $meta;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$metas = $this->meta->paginate(10);

		return View::make('metas.index', compact('metas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ejercicios = Ejercicio::orderBy('anio', 'desc')->get();
		return View::make('metas.create',[
			'ejercicios' => $ejercicios
			]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		// $validation = Validator::make($input, Meta::$rules);
		$validation = Validator::make($input, [
			'clave' => 'required',
			'anio' => 'required|exists:ejercicios,id',
			'descripcion1' => 'required']);

		if ($validation->passes())
		{
			DB::beginTransaction();
			// $this->meta->create($input);
			$meta = new Meta();
			$meta->clave = $input['clave'];
			$meta->save();

			$hoja = new Hoja();
			$hoja->descripcion = $input['descripcion1'];
			$hoja->metas_id = $meta->id;
			$hoja->ejercicios_id = $input['anio'];
			$hoja->save();

			if(strlen(trim($input['descripcion2'])) > 0)
			{
				$hoja2 = new Hoja();
				$hoja2->descripcion = $input['descripcion2'];
				$hoja2->metas_id = $meta->id;
				$hoja2->ejercicios_id = $input['anio'];
				$hoja2->save();				
			}

			DB::commit();
			return Redirect::route('metas.index');
		}
		return Redirect::route('metas.create')
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
		$meta = $this->meta->findOrFail($id);

		return View::make('metas.show', compact('meta'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$meta = $this->meta->find($id);

		if (is_null($meta))
		{
			return Redirect::route('metas.index');
		}

		return View::make('metas.edit', compact('meta'));
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
		$validation = Validator::make($input, Meta::$rules);

		if ($validation->passes())
		{
			$meta = $this->meta->find($id);
			$meta->update($input);

			return Redirect::route('metas.show', $id);
		}

		return Redirect::route('metas.edit', $id)
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
		$this->meta->find($id)->delete();

		return Redirect::route('metas.index');
	}

}
