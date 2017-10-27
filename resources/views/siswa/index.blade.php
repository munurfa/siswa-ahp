@extends('layouts.app')
@section('content')
<div class="fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$dtSiswa->total()}} DATA SISWA
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#siswa">DATA SISWA</a></li>
                        <li><a data-toggle="tab" href="#ahp">NILAI AHP SISWA</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="siswa" class="tab-pane fade in active">
                            @include('siswa.all')
                        </div>
                        <div id="ahp" class="tab-pane fade">
                           @include('siswa.ahp')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
