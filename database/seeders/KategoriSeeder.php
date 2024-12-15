<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['nama' => 'Adat', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Budaya Tari', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Makanan Khas', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
