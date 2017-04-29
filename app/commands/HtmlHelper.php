<?php
class HtmlHelper {
	public static function message() {
		$msg = Session::get('msg');
		return View::make('layouts.messages')->with('msg', $msg);
	}
}