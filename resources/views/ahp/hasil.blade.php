<?php $sub = [1 => 'subRata', 2 => 'subHadir', 3 => 'subSikap', 4 => 'subExtra']; ?>
<div class="row">
    @foreach($sub as $o=>$w)
    <div class="col-sm-6">
        <table class="table table-bordered">
    <thead>
    <tr>
        @foreach ($kriteria->where('id', $o) as $k)
            @foreach($matrikHasil->where('kriteria', $k->nama) as $hasil)
            <th>{{$k->nama}}</th>
            <th>{{$hasil->prioritas}}</th>
            @endforeach
        @endforeach
    </tr>
    </thead>
    <tbody>
       @foreach(${$w} as $g)
        <tr>
           @foreach($matrikHasil->where('kriteria', $g->nama) as $hasil)
                <td>{{$g->nama}}</td>
                <td>{{$hasil->prioritas}}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>

</table>
    </div>
@endforeach
</div>


