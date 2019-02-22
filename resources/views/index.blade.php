<!DOCTYPE html>
<html>
<head>
	<title>BelongsToMany</title>
</head>
<body>
<h1>LISTA</h1>
<h3>
<dl>
	<dt><b>DESENVOLVEDORES E SEUS PROJETOS</b></dt>
	<dd>
		<a href="/desenvolvedores_projetos">Saiba mais</a>
	</dd>
	<hr>
	<dt><b>PROJETOS E SEUS DESENVOLVEDORES</b></dt>
	<dd>
		<a href="/projetos_desenvolvedores">Saiba mais</a>
	</dd>
	<hr>
	<dt><b>ALOCAR DESENVOLVEDOR A UM PROJETO -> attach(3, [ 'horas_semanais' => 40 ])</b></dt>
	<dd>
		<a href="/alocardesenvolvedor">Saiba mais</a>
	</dd>
	<hr>
	<dt><b>ALOCAR PROJETO A UM DESENVOLVEDOR -> attach(2, [ 'horas_semanais' => 40 ])</b></dt>
	<dd>
		<a href="/alocarprojeto">Saiba mais</a>
	</dd>
	<hr>
	<dt><b>DESALOCAR DESENVOLVEDOR DE UM PROJETO -> detach([1,2,3])</b></dt>
	<dd>
		<a href="/desalocardesenvolvedor">Saiba mais</a>
	</dd>
	<hr>
	<dt><b>DESALOCAR PROJETO DE UM DESENVOLVEDOR -> detach([1,2,3])</b></dt>
	<dd>
		<a href="/desalocarprojeto">Saiba mais</a>
	</dd>
</dl>
</h3>
</body>
</html>