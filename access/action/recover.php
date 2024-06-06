<?php
if( !$_GET['key'] && !$_GET['id']) {
    echo '<p class="title">Sem parametros da chave de ativação e identificação</p>
    <ul>
        <li><a href="'.uri('access/?act=login').'">Login</a></li>
        <li><a href="'.uri('access/?act=lost-password').'">Recuperar senha</a></li>
        <li><a href="'.uri().'">'.WEBSITE.'</a></li>
    </ul>';
    die();
}
$sql = $conn->prepare("
    SELECT adm_id, adm_name, adm_email, adm_password, activation_key 
    FROM admins WHERE activation_key = ? AND adm_id = ?
");
$sql->execute([ URL::iG('key'), URL::iG('id') ]);

$row = $sql->fetch(PDO::FETCH_ASSOC);

if( $row["activation_key"] != URL::iG('key') || $row["adm_id"] != URL::iG('id') ) {
    alert('error', 'Chave de ativação inválida.');
    die();
}
else {
    echo '<p class="title">Olá '.$row["adm_name"].', seu e-mail foi confirmado, agora redefina sua senha.</p>';

    if( isset($_POST['reset'])) :

        $sql = $conn->prepare("UPDATE admins SET 
        	adm_password = ?, activation_key = ?, adm_lastupdate = ? WHERE adm_id = ?");
        if( empty($_POST['pswd']) ) {
            alert('warning', 'Insira a senha!');
        } 
        elseif( empty($_POST['confirm-pswd']) ) {
            alert('warning', 'Insira a confirmação da senha!');
        } 
        elseif( $_POST['pswd'] != $_POST['confirm-pswd'] ) {
            alert('warning', 'As senhas não coincidem!');
        } 
        elseif( !regex_password($_POST['pswd']) ) {
            alert('error', 'Senhas devem conter no minimo 8 caracteres com letras maiúsculas, minúsculas e números!');
        } 
        else {
            $sql->execute([
                password_hash($_POST['pswd'], PASSWORD_DEFAULT),
                token_generator(26),
                date('Y-m-d H:i:s'),
                URL::iG('id')
            ]);
            if($sql->rowCount() > 0) 
                alert('success', 'Senha atualizada: <a href="'.uri('access/?act=login').'">Acessar painel de controle.</a>.');
            else 
                alert('error', 'Ocorreu algum erro.<br>Por favor reportar ao dono do site.');
        }

    endif;
}
$sql = NULL;