<?php

use Illuminate\Database\Seeder;

class ParceirosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parceiros')->insert([
            'nome' => 'Revenda Shop',
            'marca' => 'VOLKWAGEN',
            'cidade' => 'Pelotas',
            'fone' => "123456789"]);

        DB::table('parceiros')->insert([
            'nome' => 'Revenda Da Esquina',
            'marca' => 'TOYOTA',
            'cidade' => 'Rio Grande',
            'fone' => "987654321"]);

        DB::table('parceiros')->insert([
                'nome' => 'Revenda Marota',
                'marca' => 'TOYOTA',
                'cidade' => 'Rio Grande',
                'fone' => "12341876"]);    

        DB::table('parceiros')->insert([
            'nome' => 'Revenda Avenida',
            'marca' => 'CITROEN',
            'cidade' => 'Canguçu',
            'fone' => "498465165"]);

        DB::table('parceiros')->insert([
            'nome' => 'Revenda RS',
            'marca' => 'RENAULT',
            'cidade' => 'São Lourenço',
            'fone' => "14198641"]);
        
        DB::table('parceiros')->insert([
                'nome' => 'Revenda Pato Branco',
                'marca' => 'FIAT',
                'cidade' => 'São Lourenço',
                'fone' => "14198698479874"]);

        DB::table('parceiros')->insert([
            'nome' => 'Revenda GOLL',
            'marca' => 'FIAT',
            'cidade' => 'Pelotas',
            'fone' => "12341649849"]);
    
        DB::table('parceiros')->insert([
                'nome' => 'Revenda do Porto',
                'marca' => 'RENAULT',
                'cidade' => 'Pelotas',
                'fone' => "12341684236"]);
    }
}
