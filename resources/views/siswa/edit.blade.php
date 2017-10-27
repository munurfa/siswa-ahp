@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">TAMBAH SISWA</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{route('siswa.update', $siswa->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @include('siswa._form')
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    UBAH
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
