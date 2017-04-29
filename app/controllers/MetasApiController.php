<?php
class MetasApiController extends BaseController {

	public function getIndex($id = 0)
	{
		if($id > 0)
		{
			return Meta::find($id);
		}
		return Meta::all();
	}

	public function getHojas($id = 0)
	{
		$meta = Meta::find($id);
		if(is_null($meta))
		{
			return;
		}
		return $meta->hojas;
	}

	public function getHojasHtml2($id)
	{
		$meta = Meta::find($id);
		if(is_null($meta))
		{
			return;
		}
		return View::make('partials.metas.sltHojas2', [
			'hojas' => $meta->hojas
			]);
	}

	public function getHojasHtml($id)
	{
		$meta = Meta::find($id);
		if(is_null($meta))
		{
			return;
		}
		return View::make('partials.metas.sltHojas', [
			'hojas' => $meta->hojas
			]);
	}
	public function getDepartamentos($id = 0){
		return Meta::find($id)->departamentos;
	}
	
}