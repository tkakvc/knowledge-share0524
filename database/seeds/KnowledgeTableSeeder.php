<?php

use Illuminate\Database\Seeder;

class KnowledgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledges')->insert([
            'title'=>'test title 1',
            'content'=>'test content 1'
            ]);
        DB::table('knowledges')->insert([
            'title'=>'test title 2',
            'content'=>'test content 2',
            ]);
        for($i = 3;$i <= 100; $i++){
            DB::table('knowledges')->insert([
                'title'=>'test title ' . $i,
                'content'=>'test content ' . $i
                ]);
        }
    }
}
