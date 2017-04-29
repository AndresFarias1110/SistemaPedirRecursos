<?php

class MetasViewController extends BaseController{

	public function getIndex(){
		return View::make('admin.metas.home');
	}
}