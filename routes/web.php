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
    	}
    	echo "<hr>";
    }
    //return $des->toJson();
});

Route::get('/projetos_desenvolvedores', function () {
	$prod = Projeto::with('desenvolvedores')->get();

	foreach ($prod as $p) {
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