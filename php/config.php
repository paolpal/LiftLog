<?php
	// File system constants
	define ("DIR_BASE", __DIR__ . '/');
	define ("DIR_UTIL", DIR_BASE . 'util/');
	define ("DIR_LAYOUT", DIR_BASE . 'layout/');
	define ("DIR_AJAX_UTIL", DIR_BASE . 'ajax/');
	define("ROOT_DIR", realpath(__DIR__.'/..').'/');
	define("ROOT_PATH", '/' . basename(rtrim(ROOT_DIR, '/\\')) . '/');
?>