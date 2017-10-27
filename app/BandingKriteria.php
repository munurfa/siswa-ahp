<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandingKriteria extends Model
{
    public static function data($id_kriteria = [], $status = 'kriteria')
    {
        $kriteria = Self::whereIn('id_kriteria', $id_kriteria)
            ->where('status', '=', $status)->get();

        return $kriteria;
    }

    public static function nilai($id_kriteria = [], $status = 'kriteria')
    {
        $kriteria = Self::whereIn('id_kriteria', $id_kriteria)
            ->where('status', '=', $status)->get();

        $jml = [];
        // $kri = [];

        $j = $kriteria->groupBy('id_banding_kriteria');
        // foreach ($id_kriteria as $v) {
        //     $l = $kriteria->groupBy('id_banding_kriteria');
        //     foreach ($l as $a) {
        //         $kri[$v] = [$l[$v]];
        //     }
        // }
        foreach ($id_kriteria as $v) {
            foreach ($j[$v] as $n) {
                $jml[$v] = $j[$v]->sum('nilai');
            }
        }

        $keyed[] = ['jumlah' => $jml];

        return $keyed;
    }
}
