<?php

use Illuminate\Database\Seeder;
use App\Stock;
use App\Item;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < Item::count(); $i++) {
            Stock::create([
                'quantity' => rand(1, 10),
                'item_id' => $i
            ]);
        }
    }
}
