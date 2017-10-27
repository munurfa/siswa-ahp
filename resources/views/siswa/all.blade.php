<br>
@if(Request::path()=='siswa')
<a href="{{route('siswa.create')}}" class="btn btn-primary">TAMBAH SISWA</a><br><br>
@endif
<table class="table table-bordered">
    <thead>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
            @foreach ($kriteria as $k)
                <th>{{$k->nama}}</th>
            @endforeach
                 @if(Request::path()=='siswa')
                <th width="150px">Action</th>
                 @endif
            </tr>
        </thead>
        <tbody>
            @foreach($dtSiswa as $siswa)
            <tr>
                <td>{{$siswa->nis}}</td>
                <td>{{$siswa->nama}}</td>
                <td>{{$siswa->nilai->nilai_rata}}</td>
                <td>{{$siswa->nilai->tingkat_hadir}}</td>
                <td>{{$siswa->nilai->sikap}}</td>
                <td>{{$siswa->nilai->jumlah_extra}}</td>
                 @if(Request::path()=='siswa')
                <td>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{url('siswa/'.$siswa->id.'/edit')}}" class="btn btn-warning btn-xs">UBAH</a>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{route('siswa.destroy', $siswa->id)}}" method="post"
                                onsubmit="return confirm('Apa Kamu Yakin ?')">
                                {{csrf_field()}}
                                <!-- <input name="_method" type="hidden" value="DELETE"> -->
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-xs" type="submit">HAPUS</button>
                            </form>
                        </div>
                    </div>
                </td>
                 @endif
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
<div class="text-center">{{$dtSiswa->links()}}</div>
