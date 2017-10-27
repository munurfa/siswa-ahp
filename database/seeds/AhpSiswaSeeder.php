<?php

use App\AhpSiswa;
use App\MatrikHasil;
use App\Siswa;
use Illuminate\Database\Seeder;

class AhpSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $matrik = MatrikHasil::where('status', 'main')->pluck('prioritas');
        $dtSiswa = Siswa::with('nilai')->get();

        foreach ($dtSiswa as $siswa) {
            $ahp = new AhpSiswa();
            $ahpRata = $siswa->ahpRata($siswa->nilai->nilai_rata) * $matrik[0];
            $ahpHadir = $siswa->ahpHadir($siswa->nilai->tingkat_hadir) * $matrik[1];
            $ahpSikap = $siswa->ahpSikap($siswa->nilai->sikap) * $matrik[2];
            $ahpExtra = $siswa->ahpExtra($siswa->nilai->jumlah_extra) * $matrik[3];
            $jumlah = $ahpRata + $ahpHadir + $ahpSikap + $ahpExtra;

            $ahp->id_siswas = $siswa->id;
            $ahp->nilai_rata = $ahpRata;
            $ahp->tingkat_hadir = $ahpHadir;
            $ahp->sikap = $ahpSikap;
            $ahp->jumlah_extra = $ahpExtra;
            $ahp->total = $jumlah;
            $ahp->save();
        }
    }
}
