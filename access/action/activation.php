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
    SELECT adm_id, adm_name, adm_email, adm_password, activation_key, adm_status 
    FROM admins WHERE activation_key = ? AND adm_id = ?
");
$sql->execute([ URL::iG('key'), URL::iG('id') ]);

$row = $sql->fetch(PDO::FETCH_ASSOC);

if( $row["activation_key"] != URL::iG('key') || $row["adm_id"] != URL::iG('id') ) {
    alert('error', 'Chave de ativação inválida.');
    die();
}
elseif( $row["adm_status"] == 1 ) {
    alert('error', 
        'Conta de administrador já ativa!<br>
        Tente <a href="'.uri('access/?act=lost-password').'">recuperar a senha</a> caso não esteja conseguindo acessar.');
        die();
}
else {
    echo '<p class="title">Olá '.$row["adm_name"].', seu e-mail foi confirmado, agora defina sua senha.</p>';

    if( isset($_POST['activation'])) :

        $sql = $conn->prepare("UPDATE admins SET adm_password = ?, activation_key = ?, adm_status = ? WHERE adm_id = ?");
        if( empty($_POST['pswd']) ) {
            alert('warning', 'Insira a senha!');
        } 
        elseif( !regex_password($_POST['pswd']) ) {
            alert('error', 'Senhas devem conter no minimo 8 caracteres com letras maiúsculas, minúsculas e números!');
        } 
        else {
            $sql->execute([
                password_hash($_POST['pswd'], PASSWORD_DEFAULT),
                token_generator(26),
                1,
                URL::iG('id')
            ]);
            if($sql->rowCount() > 0) 
                alert('success', 'Conta Ativada: <a href="'.uri('access/?act=login').'">Acessar painel de controle.</a>.');
            else 
                alert('error', 'Ocorreu algum erro.<br>Por favor reportar ao dono do site.');
        }

    endif;
}
$sql = NULL;