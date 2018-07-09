<?php

use Illuminate\Database\Seeder;

class TipoConceptosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class,40000)->create();
    }
}
