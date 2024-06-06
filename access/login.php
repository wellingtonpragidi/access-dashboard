<?php
if( isset($_SESSION['adm_token']) ) 
     header('Location: ' . uri());

$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
?>
<div id="wrapper">
	<?php include directory('access/action/login.php'); ?>
	<p class="title">Acessar painél de controle</p>
	<form method="POST" action="<?= URL::current() ?>">
		<label for="mail" class="screen_reader">E-mail</label>
		<div class="formit">
			<img class="email" src="<?= uri('access/assets/img/email.svg?v=1') ?>" alt="" />
			<input id="mail" type="text" name="mail" placeholder="E-mail" value="<?= $mail ?>" />
		</div>
		<label for="pswd" class="screen_reader">Senha</label>
		<div class="formit password">
			<img class="padlock" src="<?= uri('access/assets/img/padlock.svg?v=1') ?>" alt="" />
			<input id="pswd" type="text" class="pswd" placeholder="Senha" name="pswd" />
		</div>
		<button type="submit" name="login">Acessar</button>
	</form>
	<ul>
		<li><a href="<?= uri('access/?act=lost-password') ?>">Recuperar senha</a></li>
	</ul>
</div>