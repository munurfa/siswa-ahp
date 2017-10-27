<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Siswa</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama"
                                value="{{ (isset($siswa->nama)) ? $siswa->nama : old('nama') }}" autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>

                            <?php
                                $jk = ['Laki-Laki', 'Perempuan'];
                                $oldSelect = (isset($siswa->jenis_kelamin)) ? $siswa->jenis_kelamin :
                                    old('jenis_kelamin');
                            ?>
                            <div class="col-md-6">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    @foreach ($jk as $s)
                                        <option value="{{$s}}"
                                            {{ $oldSelect == $s ? "selected":"" }}>
                                            {{$s}}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <?php $l = (isset($l)) ? $l : false; ?>
                        @foreach($kriteria as $k)
                        <div class="form-group{{ $errors->has(camel_case($k->nama)) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Kriteria {{$k->nama}}</label>

                            <div class="col-md-6">
                                @if($k->id == 1)
                                    <input id="{{camel_case($k->nama)}}" type="text" class="form-control"
                                    name="{{camel_case($k->nama)}}"
                                    value="{{ (isset($siswa->nilai->{$l[$k->id - 1]}) ) ? $siswa->nilai->{$l[$k->id - 1]} : old(camel_case($k->nama)) }}">
                                @else
                                <select name="{{camel_case($k->nama)}}" id="{{camel_case($k->nama)}}"
                                    class="form-control">
                                    @foreach ($k->sub as $s)
                                        <option value="{{$s->nama}}"
                            <?php $oldSelect = (isset($siswa->nilai->{$l[$k->id - 1]})) ? $siswa->nilai->{$l[$k->id - 1]} : old(camel_case($k->nama)); ?>
                                            {{ $oldSelect == $s->nama ? "selected":"" }}>
                                            {{$s->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                @endif

                                @if ($errors->has(camel_case($k->nama)))
                                    <span class="help-block">
                                        <strong>{{ $errors->first(camel_case($k->nama)) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
