<?php

class HojasApiController extends BaseController{

	public function getDepartamentos($id = 0){
		return Hoja::find($id)->departamentos;
	}

	public function getHojaDesc($id = 0){
		return Hoja::find($id);
	}
}
