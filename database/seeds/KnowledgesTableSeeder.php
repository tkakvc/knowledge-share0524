<?php

use Illuminate\Database\Seeder;

class KnowledgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1;$i <= 30; $i++){
            DB::table('knowledges')->insert([
                'title'=>'test title '.$i,
                'content'=>'test content '.$i,
                'user_id'=>$i
                ]);
            
        }
    }
}
