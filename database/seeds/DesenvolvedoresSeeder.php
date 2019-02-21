<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome' => 'murilo gomes', 'cargo' => 'Programador web junior']);
        DB::table('desenvolvedores')->insert(['nome' => 'alyne cordeiro', 'cargo' => 'Analista junior']);
        DB::table('desenvolvedores')->insert(['nome' => 'irineu alves', 'cargo' => 'Analista senior']);
    }
}
