<form action="{{ route('admin.master.guru.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Form Penambahan Guru</h4>
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
                                            <input value="{{ old('nip') }}" type="number" name="nip" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
                                        <div class="form-control-feedback"><small> <code></code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ old('email') }}" type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nama Lengkap <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nomor Telf <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" value="{{ old('nomor_telf') }}" name="nomor_telf" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="c-inputs-stacked">
                                            <input name="jenis_kelamin" type="radio" id="jenis_kelamin" value="L">
                                            <label for="jenis_kelamin" class="mr-30">Laki-Laki</label>
                                            <input name="jenis_kelamin" type="radio" id="jenis_kelamin2" value="P">
                                            <label for="jenis_kelamin2" class="mr-30">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::select('tempat_lahir', $provinces, old('tempat_lahir'), ['class' => 'form-control select2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tanggal Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::date('tanggal_lahir', old('tanggal_lahir'), ['class' => 'form-control']) !!}
                                                </div>
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
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <div class="form-group">
                                            <label>Status Nikah</label>
                                            <div class="c-inputs-stacked">
                                                <input name="status_pernikahan" type="radio" id="status_pernikahan" value="Lajang">
                                                <label for="status_pernikahan" class="mr-30">Lajang</label>
                                                <input name="status_pernikahan" type="radio" id="status_pernikahan2" value="Menikah">
                                                <label for="status_pernikahan2" class="mr-30">Menikah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ayah <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ayah', old('nama_ayah'), ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ibu <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ibu', old('nama_ibu'), ['class' => 'form-control']) !!}
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
                                    <input name="status_kepegawaian" type="radio" id="status_kepegawaian" value="pns">
                                    <label for="status_kepegawaian" class="mr-30">PNS</label>
                                    <input name="status_kepegawaian" type="radio" id="status_kepegawaian2" value="honorer">
                                    <label for="status_kepegawaian2" class="mr-30">Honorer</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis PTK</label>
                                <div class="c-inputs-stacked">
                                    <input name="jenis_ptk" type="radio" id="jenis_ptk" value="sertifikasi">
                                    <label for="jenis_ptk" class="mr-30">Sertifikasi</label>
                                    <input name="jenis_ptk" type="radio" id="jenis_ptk2" value="belum sertifikasi">
                                    <label for="jenis_ptk2" class="mr-30">Belum Sertifikasi</label>
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>No SK</h5>
                                    {!! Form::text('no_sk', old('no_sk'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>Tanggal SK</h5>
                                    <div class="controls">
                                        {!! Form::date('tgl_sk', old('tgl_sk'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>NUPTK</h5>
                                    {!! Form::number('nuptk', old('nuptk'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>TMT Tugas</h5>
                                    {!! Form::date('tmt_tugas', old('tmt_tugas'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="controls">
                                <div class="form-group">
                                    <h5>Tugas Tambahan</h5>
                                    {!! Form::text('tugas_tambahan', old('tugas_tambahan'), ['class' => 'form-control']) !!}
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