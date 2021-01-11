<form action="{{ route('admin.master.siswa.store') }}" method="post" >
    @csrf
    {!! Form::hidden('password', Hash::make('rahasia'), null) !!}
    <div class="row">
        <div class="col-12">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Form Penambahan Siswa</h4>
                <span class="form-text text-muted">Biodata 
                    <code>
                    @if($errors->any())
                        <span class="badge badge-danger">Tidak Berhasil Input Data</span>
                    @endif
                    </code>
                </span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-12">						
                                    <div class="form-group">
                                        <h5>NIS <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="nis" class="form-control" value="{{ $nis }}" readonly> </div>
                                        <div class="form-control-feedback"><small> <code>{{ $errors->has('nis') ?  $errors->first('nis') : '' }}</code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>NISN <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="nisn" class="form-control" data-validation-required-message="This field is required" value="{{ old('nisn') }}"> </div>
                                            <div class="form-control-feedback"><small> <code>{{ $errors->has('nisn') ?  $errors->first('nisn') : '' }}</code> </small></div>
                                        </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" data-validation-required-message="This field is required" value="{{ old('email') }}"> </div>
                                            <div class="form-control-feedback"><small> <code>{{ $errors->has('email') ?  $errors->first('email') : '' }}</code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nama Lengkap <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" data-validation-required-message="This field is required"> </div>
                                            <div class="form-control-feedback"><small> <code>{{ $errors->has('name') ?  $errors->first('name') : '' }}</code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nomor Telf <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ old('nomor_telf') }}" type="number" name="nomor_telf" class="form-control" data-validation-required-message="This field is required"> </div>
                                            <div class="form-control-feedback"><small> <code>{{ $errors->has('nomor_telf') ?  $errors->first('nomor_telf') : '' }}</code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="c-inputs-stacked">
                                            <input name="jenis_kelamin" type="radio" id="jenis_kelamin" value="L">
                                            <label for="jenis_kelamin" class="mr-30">Laki-Laki</label>
                                            <input name="jenis_kelamin" type="radio" id="jenis_kelamin2" value="P">
                                            <label for="jenis_kelamin2" class="mr-30">Perempuan</label>
                                        </div>
                                        <div class="form-control-feedback"><small> <code>{{ $errors->has('jenis_kelamin') ?  $errors->first('jenis_kelamin') : '' }}</code> </small></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::select('tempat_lahir', $provinces, null, ['class' => 'form-control select2']) !!}
                                                </div>
                                                <div class="form-control-feedback"><small> <code>{{ $errors->has('tempat_lahir') ?  $errors->first('tempat_lahir') : '' }}</code> </small></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tanggal Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::date('tanggal_lahir', '', ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-control-feedback"><small> <code>{{ $errors->has('tanggal_lahir') ?  $errors->first('tanggal_lahir') : '' }}</code> </small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <div class="form-group">
                                            <h5>Agama <span class="text-danger">*</span></h5>
                                            <select name="agama" class="form-control select2">
                                                <option value="islam">Islam</option>
                                                <option value="kristen">kristen</option>
                                                <option value="protestan">Protestan</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="budha">Budha</option>
                                            </select>
                                            <div class="form-control-feedback"><small> <code>{{ $errors->has('agama') ?  $errors->first('agama') : '' }}</code> </small></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ayah <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ayah', old('nama_ayah'), ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-control-feedback"><small> <code>{{ $errors->has('nama_ayah') ?  $errors->first('nama_ayah') : '' }}</code> </small></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ibu <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ibu', old('nama_ibu'), ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-control-feedback"><small> <code>{{ $errors->has('nama_ibu') ?  $errors->first('nama_ibu') : '' }}</code> </small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="pull-right">
                        <button type="submit" class="btn btn-rounded btn-info">Simpan</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</form>