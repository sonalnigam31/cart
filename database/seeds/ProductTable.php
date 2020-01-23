<?php

use Illuminate\Database\Seeder;

class ProductTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=1;$i<=10;$i++)
       {
         	DB::table('products')->insert([
            'name' => 'Product '.$i,
            'product_detail' => 'Product Details'.$i.' '.Str::random(10),
            'price' => '100',
            'created_by' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
     	}
    }
}
