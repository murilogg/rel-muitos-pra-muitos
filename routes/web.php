<?php

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/', function(){
	return view('index');
});

Route::get('/desenvolvedores_projetos', function () {
	$des = Desenvolvedor::with('projetos')->get();

    foreach ($des as $p) {
    	echo "<p>ID: <b>" . $p->id . "</b></p>";
    	echo "<p>Nome do Desenvolvedor: <b>" . $p->nome . "</b></p>";
    	echo "<p>Cargo: <b>". $p->cargo ."</b></p>";
    	if(count($p->projetos) > 0){
    		echo "<p>Projetos: </p>";
    		echo "<ul>";
    		foreach ($p->projetos as $d) {
    			echo "<li>Nome: " . $d->nome . " | ";
    	    	echo "Horas do Projeto: " . $d->estimativa_horas . " hr | ";
    	    	echo "Horas Trabalhadas: " . $d->pivot->horas_semanais . " hr</li>";
    		}
    		echo "</ul>";
    	}else{
    		echo "Nenhum Projeto com este Desenvolvedor";
    	}
    	echo "<hr>";
    }
    //return $des->toJson();
});

Route::get('/projetos_desenvolvedores', function () {
	$prod = Projeto::with('desenvolvedores')->get();

	foreach ($prod as $p) {
		echo "<p>ID: <b>" . $p->id . "</b></p>";
		echo "<p>Nome do Projeto: <b>" . $p->nome . "</b></p>";
		echo "<p>Horas no Projeto: <b>" . $p->estimativa_horas . " hr</b></p>";
		if(count($p->desenvolvedores) > 0){
			echo "<p>Desenvolvedores: </p>";
			echo "<ul>";
			foreach ($p->desenvolvedores as $d) {
			     echo "<li>Nome: " . $d->nome . " | ";
			     echo "Especialidade: " . $d->cargo . " | ";
			     echo "Horas trabalhas semanais: " . $d->pivot->horas_semanais . " hr</li>";
			}
			echo "</ul>";
		}else{
			echo "Não existe nenhum Desenvolvedor neste Projeto";
		}
		echo "<hr>";
	}
    //return $prod->toJson();
});

Route::get('/alocardesenvolvedor', function(){
	$proj = Projeto::find(3);
	if(isset($proj)){
		$proj->desenvolvedores()->attach(3, [ 'horas_semanais' => 40 ]);
	}
	echo "Desenvolvedor alocado com sucesso";
});

Route::get('/alocarprojeto', function(){
	$proj = Desenvolvedor::find(1);
	if(isset($proj)){
		$proj->projetos()->attach(2, [ 'horas_semanais' => 40 ]);
	}
	echo "Projeto alocado com sucesso";
});

Route::get('/desalocardesenvolvedor', function(){
	$proj = Projeto::find(3);//PROJETO_ID
	if(isset($proj)){
		$proj->desenvolvedores()->detach(1);//DESENVOLVEDOR_ID
		echo "Desenvolvedor desalocado com sucesso";
	}else{
		echo "ERRO DESENVOLVEDOR NÃO ENCONTRADO";
	}
	
});

Route::get('/desalocarprojeto', function(){
	$proj = Desenvolvedor::find(3); // DESENVOLVEDOR_ID
	if(isset($proj)){
		$proj->projetos()->detach(4);// PROJETO_ID
		echo "Projeto desalocado com sucesso";
	}else{
		echo "ERRO PROJETO NÃO ENCONTRADO";
	}
	
});

















