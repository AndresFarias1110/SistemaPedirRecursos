<?php 

	class ResponsablesApiController extends BaseController{

		public function getResposable($id = 0){
			return Responsable::find($id);
		}
	}

 ?>