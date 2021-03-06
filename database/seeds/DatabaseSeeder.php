<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MarcasTableSeeder::class);
        $this->call(CarrosTableSeeder::class);
        $this->call(PropostasTableSeeder::class);
        $this->call(ParceirosTableSeeder::class);
        $this->call(mecanico::class);
    }
}
