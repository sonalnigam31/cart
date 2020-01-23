<?php

use Illuminate\Database\Seeder;

class PromoCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=5;$i++)
       {
         	DB::table('promocode')->insert([
            'promocode' => Str::random(10),
            'amount' => 100+($i*10),
            'type' => 'Rs',
            'isactive' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
     	}
    }
}
