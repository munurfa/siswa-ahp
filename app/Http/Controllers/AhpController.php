<?php

namespace App\Http\Controllers;

use App\BandingKriteria;
use App\Kriteria;
use App\MatrikHasil;
use App\SubKriteria;

class AhpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kriteria = Kriteria::all();
        $dtKriteria = BandingKriteria::data([1, 2, 3, 4]);
        $nilaiKriteria = BandingKriteria::nilai([1, 2, 3, 4]);

        $subRata = SubKriteria::where('id_kriterias', 1)->get();
        $dtSubRata = BandingKriteria::data([1, 2, 3, 4], 'subkriteria');
        $nilaiSubRata = BandingKriteria::nilai([1, 2, 3, 4], 'subkriteria');

        $subHadir = SubKriteria::where('id_kriterias', 2)->get();
        $dtSubHadir = BandingKriteria::data([5, 6, 7, 8], 'subkriteria');
        $nilaiSubHadir = BandingKriteria::nilai([5, 6, 7, 8], 'subkriteria');

        $subSikap = SubKriteria::where('id_kriterias', 3)->get();
        $dtSubSikap = BandingKriteria::data([9, 10, 11, 12], 'subkriteria');
        $nilaiSubSikap = BandingKriteria::nilai([9, 10, 11, 12], 'subkriteria');

        $subExtra = SubKriteria::where('id_kriterias', 4)->get();
        $dtSubExtra = BandingKriteria::data([13, 14, 15, 16], 'subkriteria');
        $nilaiSubExtra = BandingKriteria::nilai([13, 14, 15, 16], 'subkriteria');

        $matrikHasil = MatrikHasil::all();

        return view('ahp.index', compact('kriteria', 'dtKriteria', 'nilaiKriteria',
            'subRata', 'subHadir', 'subSikap', 'subExtra',
            'dtSubRata', 'nilaiSubRata',
            'dtSubHadir', 'nilaiSubHadir',
            'dtSubSikap', 'nilaiSubSikap',
            'dtSubExtra', 'nilaiSubExtra',
            'matrikHasil'
        ));
    }
}
