<?php
function sedmail($email, $nome, $title_subject, $content_body, $success, $error) {
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
	$mailer->AddAddress($email, $nome);
	$mailer->Subject = WEBSITE . ' – ' . $title_subject;

	$mailer->Body = $content_body;

	if($mailer->Send()) {
	    return $success;
	}
	else {
	    return $error/* . ' --- ' .$mailer->ErrorInfo */;
	}
}