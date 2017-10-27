<?php

use App\Kriteria;
use App\SubKriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dtKriteria = ['Rata-Rata Rapot', 'Tingkat Hadir', 'Sikap', 'Jumlah Extra'];
        $dtSubRata = ['4,00', '3,00-3,90', '2,00-2,90', '1,00-1,90'];
        $dtSubHadir = ['Tidak Ada Alfa', '1 Alfa', '2 Alfa', '3 Alfa'];
        $dtSubSikap = ['A', 'B', 'C', 'D'];
        $dtSubExtra = ['3 Extra', '2 Extra', '1 Extra', '0 Extra'];

        // save Kriteria
        foreach ($dtKriteria as $index) {
            $kriteria = new Kriteria();
            $kriteria->nama = $index;
            $kriteria->save();
        }

        // save Sub Rata2
        foreach ($dtSubRata as $index) {
            $subKriteria = new SubKriteria();
            $idKriteria = Kriteria::where('nama', 'Rata-Rata Rapot')->first()->id;
            $subKriteria->id_kriterias = $idKriteria;
            $subKriteria->nama = $index;
            $subKriteria->save();
        }

        // save Sub Hadir
        foreach ($dtSubHadir as $index) {
            $subKriteria = new SubKriteria();
            $idKriteria = Kriteria::where('nama', 'Tingkat Hadir')->first()->id;
            $subKriteria->id_kriterias = $idKriteria;
            $subKriteria->nama = $index;
            $subKriteria->save();
        }
        // save Sub Sikap
        foreach ($dtSubSikap as $index) {
            $subKriteria = new SubKriteria();
            $idKriteria = Kriteria::where('nama', 'Sikap')->first()->id;
            $subKriteria->id_kriterias = $idKriteria;
            $subKriteria->nama = $index;
            $subKriteria->save();
        }
        // save Sub Extra
        foreach ($dtSubExtra as $index) {
            $subKriteria = new SubKriteria();
            $idKriteria = Kriteria::where('nama', 'Jumlah Extra')->first()->id;
            $subKriteria->id_kriterias = $idKriteria;
            $subKriteria->nama = $index;
            $subKriteria->save();
        }
    }
}
