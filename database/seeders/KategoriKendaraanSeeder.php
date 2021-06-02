<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategories = [
            '1' => 'Motor Matic',
            '2' => 'Motor Gede',
            '3' => 'Sedan',
            '4' => 'Bus',
            '5' => 'Mini Bus',
            '6' => 'Pickup',
            '7' => 'Truck',
            '8' => 'SUV',
        ];

        foreach ($kategories as $id => $nama) {
            \App\Models\KategoriKendaraan::create([
                'id'    => (int) $id,
                'nama'  => $nama,
                'harga'  => 0,
                'keuntungan'  => 0
            ]);
        }
    }
}
