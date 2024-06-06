<?php 
if( isset($_POST['register']) ) :

    $sql = $conn->prepare("SELECT adm_email FROM admins WHERE adm_email = ?");
    $sql->execute([ $_POST['mail'] ]);
    if( $sql->rowCount() > 0 ) {
        alert('error', 'Já existe um registro com esse e-mail.');
    } else {

        $sql = $conn->prepare("INSERT admins SET adm_name = ?, adm_email = ?, adm_sex = ?, adm_registered = ?, adm_role = ?, activation_key = ?, adm_token = ?, adm_status = ?");
        $sql->execute([
            $_POST['name'],
            $_POST['mail'],
            $_POST['sex'],
            date('Y-m-d'),
            $_POST['role'],
            token_generator(26),
            token_generator(15),
            0
        ]);
        if( $sql->rowCount() > 0 ) {
            $sql = $conn->prepare("SELECT adm_id, adm_email, activation_key FROM admins WHERE adm_email = ?");
            $sql->execute([ $_POST['mail'] ]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            alert_time('success', 'Administrador registrado!', 6000, 2100);

            $mailer = new PHPMailer();
            $mailer->IsHTML();
            $mailer->CharSet   = 'utf-8';
            $mailer->IsSMTP();
            $mailer->Host       = MAIL_HOST;
            $mailer->SMTPAuth   = TRUE;
            $mailer->Username   = MAIL_USER;
            $mailer->Password   = MAIL_PSWD;
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailer->Port       = 587;
            $mailer->FromName   = WEBSITE;
            $mailer->From       = MAIL_MAIL;
            $mailer->addReplyTo(MAIL_MAIL, WEBSITE);
            $mailer->AddAddress($_POST['mail'], $_POST['name']);
            $mailer->Subject = WEBSITE . ' – Verificação';
            $activation = uri('access/?act=activation&key='.$row['activation_key'].'&id='.$row['adm_id']);
            $mailer->Body = '<div style="font-size: 1.2rem">
                <h2>Esse é um e-mail de verificação para a administração do sistema '.WEBSITE.'</h2>
                <p>Abaixo está o link que redicionará você para uma página onde irá definir sua senha e ativar a conta de administrador</p>
                <a href="'.$activation.'" target="_blank">'.$activation.'</a>
                </div>';
            if($mailer->Send()) {
                alert_time('success', 'E-mail de confirmação enviado para Administrador <strong>'.$_POST['name'].'</strong>', 6000, 2100);
            }
            else {
                alert('error', 'Erro ao enviar e-mail de confirmação para Administrador <strong>'.$_POST['name'].'</strong>');
            }
        } 
        else {
            alert_redirect('error', 'Ocorreu algum erro e o Administrador não foi registrado', URL::current(), 6000, 2100);
        }
    }
    $sql = NULL;

endif;