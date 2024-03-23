<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('barangs')->insert([
            ['nama'=>'Barang 1'],
            ['nama'=>'Barang 2'],
            ['nama'=>'Barang 3'],
            ['nama'=>'Barang 4'],
            ['nama'=>'Barang 5'],
        ]);

        DB::table('projects')->insert([
            [
                'nama'=>'Alex',
                'lokasi'=>'Jl Adam Malik',
                'totalharga'=>'100000',
            ],

            [
                'nama'=>'Jovin',
                'lokasi'=>'Jl Krakatau',
                'totalharga'=>'60000',
            ],

            [
                'nama'=>'Andi',
                'lokasi'=>'Jl Bilal',
                'totalharga'=>'500000',
            ],

        ]);


    }
}
