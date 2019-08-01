<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
   public function run(){

        DB::insert('INSERT INTO lancamentos(id, descricao) VALUES (?,?)', array(1,'ENTRADA'));
	DB::insert('INSERT INTO lancamentos(id, descricao) VALUES (?,?)', array(2,'SAIDA'));
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'capitulotemplarios901@gmail.com',
            'type' => '2',
            'password' => bcrypt('senha123'),
        ]);   
     
    }
}
