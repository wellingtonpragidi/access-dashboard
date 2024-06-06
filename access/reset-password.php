<div id="wrapper">
	<?php include directory('access/action/recover.php') ?>
	<form method="POST" action="<?= URL::current() ?>">
		<label for="pswd">Digite sua nova senha.</label>
		<div class="formit password">
			<img class="padlock" src="<?= uri('access/assets/img/padlock.svg?v=1') ?>" alt="" />
			<input id="pswd" type="text" class="pswd" placeholder="Senha" name="pswd" />
		</div>
		<label for="confirm-pswd">Digite novamente sua nova senha.</label>
		<div class="formit password">
			<img class="padlock" src="<?= uri('access/assets/img/padlock.svg?v=1') ?>" alt="" />
			<input id="confirm-pswd" type="text" class="pswd" placeholder="Confirmar senha" name="confirm-pswd" />
		</div>
		<button type="submit" name="reset">Atualizar</button>
	</form>
	<ul>
		<li><a href="<?= uri('access/?act=login') ?>">Login</a></li>
	</ul>
</div>