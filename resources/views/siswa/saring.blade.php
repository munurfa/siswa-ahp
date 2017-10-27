@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SARING SISWA</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('saring')}}">
                        {{ csrf_field() }}
                        @foreach($kriteria as $k)
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Kriteria {{$k->nama}}</label>

                            <div class="col-md-6">
                                <select name="kriteria{{$k->id}}" id="{{$k->id}}" class="form-control">
                                    @foreach ($k->sub as $s)
                                        <option value="{{$s->nama}}">{{$s->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    SARING
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
