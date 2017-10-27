<?php

use App\Kriteria;
use App\MatrikHasil;
use App\SubKriteria;
use Illuminate\Database\Seeder;

class MatrikHasilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $n = 0;
        $kriteria = Kriteria::all();
        $p = [0.56, 0.26, 0.12, 0.05];

        foreach ($kriteria as $v) {
            $hasil = new MatrikHasil();
            $hasil->kriteria = $v->nama;
            $hasil->prioritas = $p[$n++];
            $hasil->status = 'main';
            $hasil->save();
        }

        $n = 0;
        $subRata = SubKriteria::where('id_kriterias', 1)->get();
        $p = [0.48, 0.27, 0.16, 0.1];

        foreach ($subRata as $v) {
            $hasil = new MatrikHasil();
            $hasil->kriteria = $v->nama;
            $hasil->prioritas = $p[$n++];
            $hasil->status = 'subRata';
            $hasil->save();
        }

        $n = 0;
        $subHadir = SubKriteria::where('id_kriterias', 2)->get();
        $p = [0.53, 0.27, 0.13, 0.07];

        foreach ($subHadir as $v) {
            $hasil = new MatrikHasil();
            $hasil->kriteria = $v->nama;
            $hasil->prioritas = $p[$n++];
            $hasil->status = 'subHadir';
            $hasil->save();
        }

        $n = 0;
        $subSikap = SubKriteria::where('id_kriterias', 3)->get();
        $p = [0.45, 0.26, 0.19, 0.1];

        foreach ($subSikap as $v) {
            $hasil = new MatrikHasil();
            $hasil->kriteria = $v->nama;
            $hasil->prioritas = $p[$n++];
            $hasil->status = 'subSikap';
            $hasil->save();
        }
        $n = 0;
        $subExtra = SubKriteria::where('id_kriterias', 4)->get();
        $p = [0.54, 0.27, 0.13, 0.06];

        foreach ($subExtra as $v) {
            $hasil = new MatrikHasil();
            $hasil->kriteria = $v->nama;
            $hasil->prioritas = $p[$n++];
            $hasil->status = 'subExtra';
            $hasil->save();
        }
    }
}
