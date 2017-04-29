<?php

class Meta extends Eloquent {

	protected $guarded = array();

	public $timestamps= false;

	public static $rules = array(
		'clave' => 'required'
	);

	public function hojas()
	{
		return $this->hasMany('Hoja', 'metas_id', 'id');
	}

	public function departamentos(){
		return $this->belongsToMany('Depto','metas_departamentos', 'metas_id','cat_departamentos_id')->withPivot('cat_departamentos_id');
	}

}
