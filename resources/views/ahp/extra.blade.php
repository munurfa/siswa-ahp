<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            @foreach ($subExtra as $k)
                <th>{{$k->nama}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($subExtra as $k)
        <tr>
            <td>{{$k->nama}}</td>
            <?php $nk = $dtSubExtra->groupBy('id_kriteria'); ?>
            @foreach ($nk[$k->id] as $n)
                <td>{{$n->nilai}}</td>
            @endforeach
        </tr>
        @endforeach

        <tr>
            <td>Jumlah</td>
            @foreach ($nilaiSubExtra as $n)
                @foreach($n['jumlah'] as $l)
                <td>{{ $l }}</td>
                @endforeach
            @endforeach
        </tr>
    </tbody>
</table><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            @foreach ($subExtra as $k)
                <th>{{$k->nama}}</th>
            @endforeach
            <th>Jumlah</th>
            <th>Prioritas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subExtra as $k)
        <tr>
            <td>{{$k->nama}}</td>
            <?php $nk = $dtSubExtra->groupBy('id_kriteria'); ?>
            <?php $nj = $dtSubExtra->groupBy('id_banding_kriteria'); ?>

            @foreach ($nk[$k->id] as $n)
                <?php

                $l = round($n->nilai / $nj[$n->id_banding_kriteria]->sum('nilai'), 2);
               ?>

                <td>{{ $l }}</td>
                <?php $p[$n->id_banding_kriteria] = $l; ?>
            @endforeach
                <?php $prio = collect($p)->sum(); ?>
                <td><?= $prio; ?></td>
                <td><?= round(floatval($prio) / 4, 2); ?></td>

        </tr>

        @endforeach

    </tbody>
</table><br>
