<?php include directory('controller/admin-register.php') ?>
<form method="POST" action="<?php URL::current() ?>" enctype="multipart/form-data">
	<input type="text" name="name" placeholder="Nome" /><br>
	<input type="text" name="mail" placeholder="E-mail" /><br>
	<label><input id="fem" type="radio" class="rad" name="sex" value="Feminino" /><label for="fem">Feminino</label><br>
	<label><input id="mas" type="radio" class="rad" name="sex" value="Masculino" /><label for="mas">Masculino</label><br>
	<select name="role">
		<option value="1">Gestor</option>
		<option value="2">Administrador</option>
		<option value="3">Editor</option>
		<option value="4">Autor</option>
	</select><br>
	<button type="submit" class="btn" name="register">Registrar</button>
</form>