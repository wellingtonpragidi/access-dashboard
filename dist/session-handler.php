<?php
/**
 * @link https://www.php.net/manual/pt_BR/class.sessionhandler.php */
$handler = new SessionHandler();
session_set_save_handler(
    array($handler, 'open'),
    array($handler, 'close'),
    array($handler, 'read'),
    array($handler, 'write'),
    array($handler, 'destroy'),
    array($handler, 'gc')
);
register_shutdown_function('session_write_close');
session_start();


/* e/OU */

session_set_cookie_params(1314000);
session_start();
setcookie(session_name(), session_id(), time() + 1314000);
