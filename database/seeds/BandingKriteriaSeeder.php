<?php

use App\BandingKriteria;
use App\Kriteria;
use App\SubKriteria;
use Illuminate\Database\Seeder;

class BandingKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // $data = array([1,1],[1,2],[1,3],[1,4]);
    public function run()
    {
        // save Nilai Banding Kriteria
        // $kriteria = Kriteria::all();

        // foreach (range(1, 4) as $i) {
        //     foreach ($kriteria as $kri) {
        //         BandingKriteria::create([
        //                 'id_kriteria' => $i,
        //                 'id_banding_kriteria' => $kri->id,
        //                 'nilai' => 0,
        //                 'status' => 'kriteria',
        //             ]);
        //     }
        // }

        //save nilai sub kriteria nilai rata2
        // $subKriteria = SubKriteria::where('id_kriterias', 1)->get();

        // foreach (range(1, 4) as $i) {
        //     foreach ($subKriteria as $kri) {
        //         BandingKriteria::create([
        //                 'id_kriteria' => $i,
        //                 'id_banding_kriteria' => $kri->id,
        //                 'nilai' => 0,
        //                 'status' => 'subkriteria',
        //             ]);
        //     }
        // }

        //save nilai sub kriteria Hadir
        // $subKriteria = SubKriteria::where('id_kriterias', 2)->get();

        // foreach (range(5, 8) as $i) {
        //     foreach ($subKriteria as $kri) {
        //         BandingKriteria::create([
        //                 'id_kriteria' => $i,
        //                 'id_banding_kriteria' => $kri->id,
        //                 'nilai' => 0,
        //                 'status' => 'subkriteria',
        //             ]);
        //     }
        // }

        //save nilai sub kriteria nilai Sikap
        // $subKriteria = SubKriteria::where('id_kriterias', 3)->get();

        // foreach (range(9, 12) as $i) {
        //     foreach ($subKriteria as $kri) {
        //         BandingKriteria::create([
        //                 'id_kriteria' => $i,
        //                 'id_banding_kriteria' => $kri->id,
        //                 'nilai' => 0,
        //                 'status' => 'subkriteria',
        //             ]);
        //     }
        // }

        //save nilai sub kriteria nilai Sikap
        $subKriteria = SubKriteria::where('id_kriterias', 4)->get();

        foreach (range(13, 16) as $i) {
            foreach ($subKriteria as $kri) {
                BandingKriteria::create([
                        'id_kriteria' => $i,
                        'id_banding_kriteria' => $kri->id,
                        'nilai' => 0,
                        'status' => 'subkriteria',
                    ]);
            }
        }
    }
}
