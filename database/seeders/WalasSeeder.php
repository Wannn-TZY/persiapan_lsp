<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Walas;

class WalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nig' => '111',
            'nama_walas' => 'Rudi Setiawan',
            'kelas_id' => 1,
            'password' => bcrypt('1234')
            ],
            ['nig' => '222',
            'nama_walas' => 'Tari Melati',
            'kelas_id' => 2,
            'password' => bcrypt('1234')
            ],
        ];
        foreach ($data as $walas) {
            Walas::create($walas);
        }
    }
}
