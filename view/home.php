<?php 
if( isset($_SESSION) ) :
    var_dump($_SESSION);
else :
    echo 'N0 _SESSION';
endif;


echo '_SESSION id' . isset($_SESSION['adm_id']) ? $_SESSION['adm_id'] : NULL;
echo '<br>';
echo '_SESSION token' . isset($_SESSION['adm_token']) ? $_SESSION['adm_token'] : NULL;
echo '<hr>';

echo 'ID: ' . $admin->Id();

echo '<br>';

echo 'Nome: ' . $admin->name();

echo '<br>';

echo 'E-mail: ' . $admin->email();

echo '<br>';

echo 'Senha: ' . $admin->pswd();

echo '<br>';

echo 'Foto: ' . $admin->picture();

echo '<br>';

echo 'Data nascimento: ' . $admin->birthdate();

echo '<br>';

echo 'Sexo: ' . $admin->sex();

echo '<br>';

echo 'Registrado em: ' . $admin->registered();

echo '<br>';

echo 'Ultima atualização: ' . $admin->update();

echo '<br>';

echo 'Função: ' . $admin->role();

echo '<br>';

echo 'Chave de ativação: ' . $admin->activationkey();

echo '<br>';

echo 'Token: ' . $admin->token();

echo '<br>';

echo 'Status: ' . $admin->status();