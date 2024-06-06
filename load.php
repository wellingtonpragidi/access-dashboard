<?php
spl_autoload_register( function($class) {
	if( file_exists( directory('model/'.$class.'.php') ) )
		include_once directory('model/'.$class.'.php');
});