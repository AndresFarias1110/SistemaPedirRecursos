<?php
class AccionesApiController extends BaseController {

	public function getIndex()
	{

	}

	public function getAccionDesc($id = 0){
		return Accione::find($id);
	}
	
}