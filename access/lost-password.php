<div id="wrapper">
	<?php include directory('access/action/lost.php') ?>
	<p class="title">Recuperar senha</p>
	<form method="POST" action="<?= URL::current() ?>">
		<label for="mail">Digite seu endereço de e-mail. Você receberá um link no mesmo para criar uma nova senha.</label>
		<div class="formit">
			<img class="email" src="<?= uri('access/assets/img/email.svg?v=1') ?>" alt="" />
			<input id="mail" type="email" name="mail" placeholder="E-mail" />
		</div>
		<button type="submit" name="lost">Enviar</button>
	</form>
	<ul>
		<li><a href="<?= uri('access/?act=login') ?>">Login</a></li>
	</ul>
</div>