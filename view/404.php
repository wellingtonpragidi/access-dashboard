<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nada encontrado</title>
<style>body{position:relative;margin:0;font-size:1.15rem;font-family:system-ui,sans-serif;background:url("<?= uri('assets/img/parede.jpg') ?>");background-size:cover;text-align:center;text-transform:uppercase;color:#FBD130;text-shadow:2px 2px 4px #000}h1{font-size:3rem}h2 img{max-width:100%}h3{position:relative;top:-70px;font-size:1.8em}ul{position:relative;top:-60px;background:rgba(0, 0, 0, 0.50);width:210px;margin:0 auto;padding:4px 0 5px 0;list-style:none;border-radius:10px;box-shadow:0 0 4px rgba(0, 0, 0, 0.50)}a{color:#E5E5E5;text-transform:none;text-decoration:none;font-weight:700}a:hover{color:#FFFFFF}#webship{position:absolute;bottom:18px;right:18px;}#webship img{width:150px}</style>
</head>
<body>
	<h1>Erro</h1>

	<h2> <img src="<?= uri('assets/img/404.png') ?>" alt="404" /> </h2>

	<h3>Nada encontrado!</h3>

	<ul>
		<li><a href="javascript:history.back(1)">Voltar</a></li>
		<li><a href="http://<?= $_SERVER["SERVER_NAME"] ?>">Ir para a página inicial</a></li>
	</ul>

	<div id="webship">
	    <img src="<?= uri('assets/img/webship.png') ?>" alt="webship">
	</div>
</body>
</html>