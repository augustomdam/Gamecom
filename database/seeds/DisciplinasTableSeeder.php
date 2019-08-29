<?php

use Illuminate\Database\Seeder;

class DisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into  disciplinas (nome, curso, semestre, user_id) values (?, ?, ?, ?)',
        array ('Banco de Dados',  'SI', 'Quarto', 1));
    }
}
