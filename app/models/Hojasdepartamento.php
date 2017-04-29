<?php

class Hojasdepartamento extends  Eloquent {

	protected $guarded = array();
	public $timestamps = false;


	public function acciones(){
		return $this -> belongsToMany('Accione','hojas_departamentos_acciones','hojas_departamentos_id','acciones_id');
	}

	public function hoja() {
		return $this->belongsTo('Hoja');
	}
}