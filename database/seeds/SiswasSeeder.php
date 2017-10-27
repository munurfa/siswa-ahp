<?php

use App\NilaiSiswa;
use App\Siswa;
use Illuminate\Database\Seeder;

class SiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\id_ID\Person($faker));

        for ($i = 0; $i < 200; ++$i) {
            $siswa = new Siswa();
            $nilai = new NilaiSiswa();
            $siswa->nis = substr($faker->unique()->nik, 0, 5);
            $siswa->nama = $faker->firstName($faker->randomElement($array = ['male', 'female'])).' '
                            .$faker->lastName($faker->randomElement($array = ['male', 'female']));
            $siswa->jenis_kelamin = $faker->randomElement($array = ['Laki-Laki', 'Perempuan']);
            $siswa->save();

            $siswaId = $siswa->id;
            $nilai->id_siswas = $siswaId;
            $nilai->nilai_rata = $this->rand_float(0, 4);
            $nilai->tingkat_hadir = $faker->randomElement($array = ['Tidak Ada Alfa', '1 Alfa', '2 Alfa', '3 Alfa']);
            $nilai->sikap = $faker->randomElement($array = ['A', 'B', 'C', 'D']);
            $nilai->jumlah_extra = $faker->randomElement($array = ['3 Extra', '2 Extra', '1 Extra', '0 Extra']);
            $nilai->save();
        }
    }

    public function rand_float($st_num = 0, $end_num = 1, $mul = 1000000)
    {
        if ($st_num > $end_num) {
            return false;
        }

        return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
    }
}
