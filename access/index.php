<?php
include(dirname(__DIR__).'/config.php');

/*if(session logged) {
    header( 'Location: ' . uri() );
}
else {
	include directory('access/?act=login');
}*/

include directory('access/header.php');

switch( URL::iG('act') ) :
    case 'login':
        include directory('access/login.php');
    break;
    case 'lost-password':
        include directory('access/lost-password.php');
    break;
    case 'reset-password':
        include directory('access/reset-password.php');
    break;
    case 'activation':
        include directory('access/activation.php');
    break;
    default:
        include directory('access/login.php');
    break;
endswitch;

include directory('access/footer.php');