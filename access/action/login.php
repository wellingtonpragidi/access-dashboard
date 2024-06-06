<?php
if(isset($_POST['login'])) :
    $sql = $conn->prepare("SELECT adm_id, adm_email, adm_password, adm_token FROM admins WHERE adm_email = ?");

    $sql->execute([ $_POST['mail'] ]);

    if($sql->rowCount() > 0) :
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $id    = $row["adm_id"];
        $mail  = $row["adm_email"];
        $pswd  = $row["adm_password"];
        $token = $row["adm_token"];
    else :
        alert('error', 'Administrador não registrado.');
    endif;

    $sql = NULL;

    if( empty($mail) ) {
        alert('error', 'Administrador não registrado.');
    }
    else {
        $hash = password_verify($_POST['pswd'], $pswd);
        if(empty($_POST['pswd'])) {
            alert('error', 'Insira a senha.');
        } 
        elseif($hash == FALSE) {
            alert('error', 'Senha incorreta.');
        }
        else {
            $_SESSION['adm_id'] = $id;
            $_SESSION['adm_token'] = $token;

            alert_redirect('success', 'Redirecionando para o sistema. .  .', uri(), 3000, 1050);
        }
    }
endif;