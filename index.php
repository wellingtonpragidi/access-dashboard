<?php 
include(__DIR__.'/config.php');

if( isset($_SESSION['adm_id']) && isset($_SESSION['adm_token']) && $admin->status() == 1 ) :

    include directory('view/index.php');

else :

	header('Location: ' . uri('access/') );

endif;