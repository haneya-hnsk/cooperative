<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i = 0; $i <= 10; $i++) {
        }

        $faker = Factory::create();
        for ($i = 0; $i < 55; $i++) {
            $data[$i] = [
                'nama' => $faker->name,
                'hp' => $faker->phoneNumber(),
                'jenis' => $faker->name,
                'alamat' => $faker->address,
                'tgl_daftar' => now(),
                // 'status' => 0,
                'created_at' => now()

            ];
        }
        DB::table('nasabahs')->insert($data);

        for ($i = 0; $i <= 4; $i++) {
            $data2[$i] = [
                'nama_jenis_tabungan' => $faker->firstName(),
                'keterangan' => $faker->paragraph(),


            ];
        }
        DB::table('jenis_tabungans')->insert($data2);


        for ($i = 1; $i < 56; $i++) {
            $data3[$i] = [
                'no_rek' => $faker->randomNumber(9),
                'id_nasabah' => $i,
                'id_jenis_tabungan' => $faker->numberBetween(1, 4),
                'status' => 1,
                'tgl_aktif' => now(),
                'created_at' => now()


            ];
        }
        DB::table('rekenings')->insert($data3);

        for ($i = 1; $i < 56; $i++) {
            $data4[$i] = [
                'no_rek' => $faker->randomNumber(9),
                // 'id_nasabah' => $i,
                'keterangan' => $faker->paragraph(),

                'id_jenis_transaksi' => $faker->numberBetween(1, 4),
                'nominal' => $faker->randomElement(['50000', '100000', '200000', '150000']),
                'created_at' => now()

            ];
        }
        DB::table('transaksis')->insert($data4);

        for ($i = 1; $i < 5; $i++) {
            $data5[$i] = [
                'nama_transaksi' => $faker->sentence(),
                'keterangan' => $faker->paragraph(),
                // 'menambah_saldo' => $faker->randomElement([0,1 ])
                'created_at' => now()


            ];
        }
        DB::table('jenis_transaksis')->insert($data5);
    }
}
