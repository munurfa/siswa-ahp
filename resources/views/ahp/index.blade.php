@extends('layouts.app')
@section('content')
<div class="fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    PROSES AHP
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#kriteria">KRITERIA</a></li>
                        <li><a data-toggle="tab" href="#rata">SUB NILAI RATA-RATA</a></li>
                        <li><a data-toggle="tab" href="#hadir">SUB TINGKAT HADIR</a></li>
                        <li><a data-toggle="tab" href="#sikap">SUB SIKAP</a></li>
                        <li><a data-toggle="tab" href="#extra">SUB JUMLAH EXTRA</a></li>
                        <li><a data-toggle="tab" href="#hasil">MATRIK HASIL</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="kriteria" class="tab-pane fade in active">
                            @include('ahp.kriteria')
                        </div>
                        <div id="rata" class="tab-pane fade">
                           @include('ahp.rata')
                        </div>
                        <div id="hadir" class="tab-pane fade">
                            @include('ahp.hadir')
                        </div>
                        <div id="sikap" class="tab-pane fade">
                            @include('ahp.sikap')
                        </div>
                        <div id="extra" class="tab-pane fade">
                            @include('ahp.extra')
                        </div>
                        <div id="hasil" class="tab-pane fade">
                            @include('ahp.hasil')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
