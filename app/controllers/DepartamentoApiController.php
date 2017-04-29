<?php
 class DepartamentoApiController extends BaseController{
	
	public function getDepartamento($id = 0){
			return Depto::find($id);
	}
	public function getMetas($ida = 0){
		$hojas = Depto::find($ida)->hojas;

		foreach($hojas as $desc)
		{
			echo $desc->descripcion;
		}
	}

	public function getHojas($iddpto = 0){
		return Depto::find($iddpto)->hojas;
	}

	public function getMetass($iddpto){
		return Depto::find($iddpto)->metas; 
	}
}

