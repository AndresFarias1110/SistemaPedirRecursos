<?php

class Hoja extends Eloquent {

	protected $table = 'hojas';

	public $timestamps = false;

	public static $rules = [
		'descriocion' => 'required'
	];

	public function meta()
	{
		return $this->belongsTo('Meta', 'metas_id', 'id');
	}

	public function departamentos(){
		return $this -> belongsToMany('Depto','hojasdepartamentos','id_hoja','id_departamento');
	}

	public function hojasDeptos() {
		return $this->hasMany('Hojasdepartamento', 'id_hoja', 'id');
	}

	public function ejercicio(){
		return $this->belongsTo('Ejercicio');
	}

}