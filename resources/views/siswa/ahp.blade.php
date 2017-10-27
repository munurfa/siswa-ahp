<br>
<table class="table table-bordered">
    <thead>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
            @foreach ($kriteria as $k)
                <th>{{$k->nama}}</th>
            @endforeach
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dtSiswa as $a)
           <tr>
                <td>{{$a->nis}}</td>
                <td>{{$a->nama}}</td>
                <td>{{$a->ahp->nilai_rata}}</td>
                <td>{{$a->ahp->tingkat_hadir}}</td>
                <td>{{$a->ahp->sikap}}</td>
                <td>{{$a->ahp->jumlah_extra}}</td>
                <td>{{$a->ahp->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
<div class="text-center">{{$dtSiswa->links()}}</div>
