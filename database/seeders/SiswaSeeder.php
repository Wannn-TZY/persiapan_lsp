<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nis' => '112',
            'nama_siswa' => 'Arya',
            'kelas_id' => 1,
            'password' => bcrypt('112')
            ],
            ['nis' => '113',
            'nama_siswa' => 'Amelia',
            'kelas_id' => 1,
            'password' => bcrypt('113')
            ],
            ['nis' => '114',
            'nama_siswa' => 'Beka',
            'kelas_id' => 2,
            'password' => bcrypt('114')
            ],
            ['nis' => '115',
            'nama_siswa' => 'Alya',
            'kelas_id' => 2,
            'password' => bcrypt('115')
            ],
        ];
        foreach ($data as $siswa){
            Siswa::create($siswa);
        }
    }
}
