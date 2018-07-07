<?php

use Illuminate\Database\Seeder;

class mecanico extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mecanicos')->insert([
            'nome' => 'Grazziano',
            'endereco' => 'Rua x n° 500',
            'especialidade' => 'chapista',
            'telefone' => "123456789",
            'created_at'=> date('Y-m-d h:i:s'),
            'updated_at'=>  date('Y-m-d h:i:s')
            ]);

            DB::table('mecanicos')->insert([
                'nome' => 'Rafael',
                'endereco' => 'Rua y nº 503',
                'especialidade' => 'pintura',
                'telefone' => "1789546582",
                'created_at'=> date('Y-m-d h:i:s'),
                'updated_at'=>  date('Y-m-d h:i:s')
                ]);

                DB::table('mecanicos')->insert([
                    'nome' => 'Lucas',
                    'endereco' => 'Rua a nº 505',
                    'especialidade' => 'mecanico',
                    'telefone' => "123654751",
                    'created_at'=> date('Y-m-d h:i:s'),
                    'updated_at'=>  date('Y-m-d h:i:s')
                    ]);

         DB::table('mecanicos')->insert([
                        'nome' => 'Edecio',
                        'endereco' => 'Rua a nº 105',
                        'especialidade' => 'pintura',
                        'telefone' => "123654751",
                        'created_at'=> date('Y-m-d h:i:s'),
                        'updated_at'=>  date('Y-m-d h:i:s')
                        ]);

          DB::table('mecanicos')->insert([
                            'nome' => 'Angelo',
                            'endereco' => 'Rua b nº 1010',
                            'especialidade' => 'chapista',
                            'telefone' => "123654751",
                            'created_at'=> date('Y-m-d h:i:s'),
                            'updated_at'=>  date('Y-m-d h:i:s')
                            ]);
    }
}
