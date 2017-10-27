<?php

namespace App\Http\Controllers;

use App\AhpSiswa;
use App\Kriteria;
use App\MatrikHasil;
use App\NilaiSiswa;
use App\Siswa;
use Faker;
use Illuminate\Http\Request;
use Validator;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        $foo = [
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
        ];
        $kriteria = Kriteria::all();
        foreach ($kriteria as $v) {
            if (1 == $v->id) {
                $foo[camel_case($v->nama)] = 'required|min:0.00|max:4.00|numeric|between:0.00,4.00';
            } else {
                $foo[camel_case($v->nama)] = 'required';
            }
        }

        return Validator::make($data, $foo);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $matrik = MatrikHasil::where('status', 'main')->pluck('prioritas');
        $dtSiswa = Siswa::with('nilai', 'ahp')->latest()->paginate(10);

        return view('siswa.index', compact('dtSiswa', 'kriteria', 'matrik'));
    }

    public function saringSiswa()
    {
        $kriteria = Kriteria::with('sub')->get();

        return view('siswa.saring', compact('kriteria'));
    }

    public function saring(Request $r)
    {
        $range = str_replace(',', '.', $r->input('kriteria1'));
        $krite = [
                'range1' => substr($range, 0, 4),
                'range2' => substr($range, -4),
                'hadir' => $r->input('kriteria2'),
                'sikap' => $r->input('kriteria3'),
                'extra' => $r->input('kriteria4'),
            ];
        $dtSiswa = Siswa::whereHas('nilai', function ($query) use ($krite) {
            $query->whereBetween('nilai_rata', [(float) $krite['range1'], (float) $krite['range2']])
                ->where('tingkat_hadir', $krite['hadir'])
                ->where('sikap', $krite['sikap'])
                ->where('jumlah_extra', $krite['extra']);
        })
        ->with(['nilai', 'ahp'])->paginate(10);

        $kriteria = Kriteria::all();
        $matrik = MatrikHasil::where('status', 'main')->pluck('prioritas');

        return view('siswa.index', compact('dtSiswa', 'kriteria', 'matrik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::with('sub')->get();

        return view('siswa.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\id_ID\Person($faker));

        $validator = Self::validator($request->all());
        if ($validator->fails()) {
            return redirect('siswa/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $siswa = new Siswa();
        $nilai = new NilaiSiswa();
        $ahp = new AhpSiswa();
        $kriteria = Kriteria::all();
        $matrik = MatrikHasil::where('status', 'main')->pluck('prioritas');
        $l = ['nilai_rata', 'tingkat_hadir', 'sikap', 'jumlah_extra'];
        $n = 0;

        $siswa->nis = substr($faker->unique()->nik, 0, 5);
        $siswa->nama = $request->input('nama');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->save();

        $siswaId = $siswa->id;
        $nilai->id_siswas = $siswaId;
        $l = ['nilai_rata', 'tingkat_hadir', 'sikap', 'jumlah_extra'];
        $n = 0;
        foreach ($kriteria as $v) {
            $nilai->{$l[$n++]} = $request->input(camel_case($v->nama));
        }
        $nilai->save();

        $n = 0;
        $jumlah = 0;
        $prio = ['ahpRata', 'ahpHadir', 'ahpSikap', 'ahpExtra'];
        $ahpSiswa = Siswa::with('nilai')->find($siswa->id);
        $ahp->id_siswas = $siswaId;
        foreach ($kriteria as $v) {
            ${$prio[$v->id - 1]} = $ahpSiswa->{$prio[$v->id - 1]}($ahpSiswa->nilai->{$l[$v->id - 1]}) * $matrik[$n++];
            $ahp->{$l[$v->id - 1]} = ${$prio[$v->id - 1]};
            $jumlah += ${$prio[$v->id - 1]};
        }

        $ahp->total = $jumlah;
        $ahp->save();

        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Siswa $siswa
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Siswa $siswa
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $l = ['nilai_rata', 'tingkat_hadir', 'sikap', 'jumlah_extra'];
        $kriteria = Kriteria::with('sub')->get();

        return view('siswa.edit', compact('kriteria', 'siswa', 'l'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Siswa               $siswa
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validator = Self::validator($request->all());
        if ($validator->fails()) {
            return redirect()->route('siswa.edit', $siswa->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $nilai = NilaiSiswa::where('id_siswas', $siswa->id)->firstOrFail();
        $ahp = AhpSiswa::where('id_siswas', $siswa->id)->firstOrFail();
        $kriteria = Kriteria::all();
        $matrik = MatrikHasil::where('status', 'main')->pluck('prioritas');
        $l = ['nilai_rata', 'tingkat_hadir', 'sikap', 'jumlah_extra'];
        $n = 0;

        $siswa->nama = $request->input('nama');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->save();

        $siswaId = $siswa->id;
        $l = ['nilai_rata', 'tingkat_hadir', 'sikap', 'jumlah_extra'];
        $n = 0;
        foreach ($kriteria as $v) {
            $nilai->{$l[$n++]} = $request->input(camel_case($v->nama));
        }
        $nilai->save();

        $n = 0;
        $jumlah = 0;
        $prio = ['ahpRata', 'ahpHadir', 'ahpSikap', 'ahpExtra'];
        $ahpSiswa = Siswa::with('nilai')->find($siswa->id);
        $ahp->id_siswas = $siswaId;
        foreach ($kriteria as $v) {
            ${$prio[$v->id - 1]} = $ahpSiswa->{$prio[$v->id - 1]}($ahpSiswa->nilai->{$l[$v->id - 1]}) * $matrik[$n++];
            $ahp->{$l[$v->id - 1]} = ${$prio[$v->id - 1]};
            $jumlah += ${$prio[$v->id - 1]};
        }

        $ahp->total = $jumlah;
        $ahp->save();

        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Siswa $siswa
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect('siswa');
    }
}
