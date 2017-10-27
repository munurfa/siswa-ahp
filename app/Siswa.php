<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function nilai()
    {
        return $this->hasOne('App\NilaiSiswa', 'id_siswas', 'id');
    }

    public function ahp()
    {
        return $this->hasOne('App\AhpSiswa', 'id_siswas', 'id');
    }

    public function getTotalAhpAttribute($value)
    {
        return $value = $this->ahp->attributes['total'];
    }

    public function ahpRata($value)
    {
        $rata = \App\MatrikHasil::where('status', 'subRata')->pluck('prioritas');

        if ($value <= 1.90) {
            $nilai = $rata[3];
        } elseif ($value <= 2.90) {
            $nilai = $rata[2];
        } elseif ($value <= 3.90) {
            $nilai = $rata[1];
        } else {
            $nilai = $rata[0];
        }

        return $nilai;
    }

    public function ahpHadir($value)
    {
        $hadir = \App\MatrikHasil::where('status', 'subHadir')->pluck('prioritas');

        if ('Tidak Ada Alfa' == $value) {
            $nilai = $hadir[0];
        } elseif ('1 Alfa' == $value) {
            $nilai = $hadir[1];
        } elseif ('2 Alfa' == $value) {
            $nilai = $hadir[2];
        } else {
            $nilai = $hadir[3];
        }

        return $nilai;
    }

    public function ahpSikap($value)
    {
        $sikap = \App\MatrikHasil::where('status', 'subSikap')->pluck('prioritas');

        if ('A' == $value) {
            $nilai = $sikap[0];
        } elseif ('B' == $value) {
            $nilai = $sikap[1];
        } elseif ('C' == $value) {
            $nilai = $sikap[2];
        } else {
            $nilai = $sikap[3];
        }

        return $nilai;
    }

    public function ahpExtra($value)
    {
        $extra = \App\MatrikHasil::where('status', 'subExtra')->pluck('prioritas');

        if ('3 Extra' == $value) {
            $nilai = $extra[0];
        } elseif ('2 Extra' == $value) {
            $nilai = $extra[1];
        } elseif ('1 Extra' == $value) {
            $nilai = $extra[2];
        } else {
            $nilai = $extra[3];
        }

        return $nilai;
    }
}
