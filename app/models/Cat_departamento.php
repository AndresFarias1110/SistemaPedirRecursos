<?php

class Departamento extends Eloquent
{
	protected $table = 'cat_departamentos';

	function metas(){
		return $this -> belongsToMany('Meta', 'metas_departamentos', 'cat_departamentos_id', 'id');
	}

} 