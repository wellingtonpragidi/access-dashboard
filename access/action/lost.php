<?php
if( isset($_POST['lost']) ) :

    $sql = $conn->prepare("SELECT adm_id, adm_name, adm_email, activation_key FROM admins WHERE adm_email = ?");
    $sql->execute([ $_POST['mail'] ]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($sql->rowCount() > 0) {

        if( empty($_POST['mail']) ) {
            alert('warning', 'Insira a o e-mail!');
        } 
        else {
            if($sql->rowCount() > 0) {
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
                $mailer->AddAddress($row["adm_email"], $row["adm_name"]);
                $mailer->Subject = WEBSITE . ' – Redefenir senha';
                $reset = uri('access/?act=reset-password&key='.$row["activation_key"].'&id='.$row["adm_id"]);
                $mailer->Body = '<div style="font-size: 1.2rem">
                    <p>Clique no link abaixo para criar uma nova senha.</p>
                    <a href="'.$reset.'" target="_blank">'.$reset.'</a>
                    </div>';
                if($mailer->Send()) {
                    alert_time('success', 'Foi enviado um e-mail contendo um link para redefinir sua senha.', 6000, 2100);
                }
                else {
                    alert('error', 'E-mail de para redefinir senha não enviado, por favor tente novamente ou entre em contato com o dono do website');
                }
            }
        }

    }
    else {
        alert('error', 'E-mail não cadastrado no sistema de administradores');
    }

endif;