<form action="{{ route('admin.master.guru.update', $guru['kd_guru']) }}" method="post" >
    @csrf
    <div class="row">
        <div class="col-6">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Form Edit Guru</h4>
                <span class="form-text text-muted">Biodata <code></code> <code></code></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-12">						
                                    <div class="form-group">
                                        <h5>NIP <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $guru['nip'] }}" type="number" name="nip" class="form-control" required data-validation-required-message="This field is required"> </div>
                                        <div class="form-control-feedback"><small> <code></code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $guru->GuruToUser->email }}" type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nama Lengkap <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $guru->GuruToUser->name }}" type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nomor Telf <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $guru['nomor_telf'] }}" type="text" name="nomor_telf" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="c-inputs-stacked">
                                            <input {{ $guru['jenis_kelamin'] == 'L' ? 'checked' : '' }} name="jenis_kelamin" type="radio" id="jenis_kelamin" value="L">
                                            <label for="jenis_kelamin" class="mr-30">Laki-Laki</label>
                                            <input {{ $guru['jenis_kelamin'] == 'P' ? 'checked' : '' }} name="jenis_kelamin" type="radio" id="jenis_kelamin2" value="P">
                                            <label for="jenis_kelamin2" class="mr-30">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::select('tempat_lahir', $provinces, $guru->tempat_lahir, ['class' => 'form-control select2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tanggal Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::date('tanggal_lahir', $guru->tanggal_lahir, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <div class="form-group">
                                            <h5>Agama <span class="text-danger">*</span></h5>
                                            <select name="agama" class="form-control select2">
                                                <option {{ $guru['agama'] == 'islam' ? 'checked' : '' }} value="islam">Islam</option>
                                                <option {{ $guru['agama'] == 'kristen' ? 'checked' : '' }} value="kristen">kristen</option>
                                                <option {{ $guru['agama'] == 'protestan' ? 'checked' : '' }} value="protestan">Protestan</option>
                                                <option {{ $guru['agama'] == 'hindu' ? 'checked' : '' }} value="hindu">Hindu</option>
                                                <option {{ $guru['agama'] == 'budha' ? 'checked' : '' }} value="budha">Budha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <div class="form-group">
                                            <label>Status Nikah</label>
                                            <div class="c-inputs-stacked">
                                                <input {{ $guru['status_nikah'] == 'Lajang' ? 'checked' : '' }} name="status_pernikahan" type="radio" id="status_pernikahan" value="Lajang">
                                                <label for="status_pernikahan" class="mr-30">Lajang</label>
                                                <input {{ $guru['status_nikah'] == 'Menikah' ? 'checked' : '' }} name="status_pernikahan" type="radio" id="status_pernikahan2" value="Menikah">
                                                <label for="status_pernikahan2" class="mr-30">Menikah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ayah <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ayah', $guru->nama_ayah, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ibu <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ibu', $guru->nama_ibu, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            
            <!-- /.box -->
        </div>
        <div class="col-6">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Form Penambahan Guru</h4>
                <span class="form-text text-muted">Additional <code></code> <code></code></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Status Kepegawaian</label>
                                <div class="c-inputs-stacked">
                                    <input {{ $guru['status_kepegawaian'] == 'pns' ? 'checked' : '' }} name="status_kepegawaian" type="radio" id="status_kepegawaian" value="pns">
                                    <label for="status_kepegawaian" class="mr-30">PNS</label>
                                    <input {{ $guru['status_kepegawaian'] == 'honorer' ? 'checked' : '' }} name="status_kepegawaian" type="radio" id="status_kepegawaian2" value="honorer">
                                    <label for="status_kepegawaian2" class="mr-30">Honorer</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis PTK</label>
                                <div class="c-inputs-stacked">
                                    <input {{ $guru['jenis_ptk'] == 'Sertifikasi' ? 'checked' : '' }} name="jenis_ptk" type="radio" id="jenis_ptk" value="sertifikasi">
                                    <label for="jenis_ptk" class="mr-30">Sertifikasi</label>
                                    <input {{ $guru['jenis_ptk'] == 'Belum Sertifikasi' ? 'checked' : '' }} name="jenis_ptk" type="radio" id="jenis_ptk2" value="belum sertifikasi">
                                    <label for="jenis_ptk2" class="mr-30">Belum Sertifikasi</label>
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>No SK</h5>
                                    {!! Form::text('no_sk', $guru->no_sk, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>Tanggal SK</h5>
                                    <div class="controls">
                                        {!! Form::date('tgl_sk', $guru->tgl_sk, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>NUPTK</h5>
                                    {!! Form::number('nuptk', $guru->nuptk, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>TMT Tugas</h5>
                                    {!! Form::date('tmt_tugas', $guru->tmt_tugas, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>Tugas Tambahan</h5>
                                    {!! Form::text('tugas_tambahan', $guru->tugas_tambahan, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>File Input Field <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="pas_foto" class="form-control"> </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            
            <!-- /.box -->
        </div>
    </div>
</form>