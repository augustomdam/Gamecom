<?php

use App\Funcao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcao::create([
            'nome' => 'admin',
        ]);
        Funcao::create([
            'nome' => 'professor',
        ]);
        Funcao::create([
            'nome' => 'aluno',
        ]);
    }
}
