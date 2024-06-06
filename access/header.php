<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="robots" content="noindex, nofollow" />
<title>
<?php
switch( URL::iG('act') ) :
    case 'login':
        echo 'Acessar – ' . TITLE;
    break;
    case 'lost-password':
        echo 'Recuperar senha – ' . TITLE;
    break;
    case 'reset-password':
        echo 'Redefinir senha – ' . TITLE;
    break;
    case 'activation':
        echo 'Ativação – ' . TITLE;
    break;
endswitch
?>
</title>
<style><?php include directory('access/assets/css/style.css') ?></style>
</head>
<body>
<div id="logotipo">
    <a href="https://webship.com.br">
        <img src="<?= uri('access/assets/img/webship.svg') ?>" alt="webship" />
    </a>
</div>
