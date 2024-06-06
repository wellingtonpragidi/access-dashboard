<?php
switch(URL::param(0)) :
	case NULL:
		include directory('view/home.php');
	break;
	case 'admin':
		if( URL::param(1) == 'register' ) {
		    include directory('view/admin-register.php');
		}
	break;
	case '403':
		include directory('view/403.php');
	break;
	case '404':
		include directory('view/404.php');
	break;
	case 'logout':
		include directory('view/logout.php');
	break;
	default:
		// code...
	break;
endswitch;