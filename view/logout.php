<?php 
/* atualizar token no banco de dados */
session_unset();
session_destroy();
$_SESSION = [];
// alert_redirect('warning', 'Limpando sessões e fazendo logout. . &nbsp; .', 2900, 1100);