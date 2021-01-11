<form action="{{ $route }}" method="post" >
    @csrf
    <div class="row">
        <div class="col-12">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Form Penambahan Siswa</h4>
                <span class="form-text text-muted">Biodata <code></code> <code></code></span>
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
                                            <input value="{{ $data->nis }}" type="number" name="nis" class="form-control" required data-validation-required-message="This field is required" readonly> </div>
                                        <div class="form-control-feedback"><small> <code></code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>NISN <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $data->nisn }}" type="number" name="nisn" class="form-control" required data-validation-required-message="This field is required"> </div>
                                        <div class="form-control-feedback"><small> <code></code> </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $data->SiswaToUser->email }}" type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nama Lengkap <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $data->SiswaToUser->name }}" type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nomor Telf <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $data->nomor_telf }}" type="number" name="nomor_telf" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="c-inputs-stacked">
                                            <input name="jenis_kelamin" type="radio" {{ $data->jenis_kelamin == 'L' ? 'checked' : '' }} id="jenis_kelamin" value="L">
                                            <label for="jenis_kelamin" class="mr-30">Laki-Laki</label>
                                            <input name="jenis_kelamin" type="radio" {{ $data->jenis_kelamin == 'P' ? 'checked' : '' }} id="jenis_kelamin2" value="P">
                                            <label for="jenis_kelamin2" class="mr-30">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::select('tempat_lahir', $provinces, $data->tempat_lahir, ['class' => 'form-control select2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Tanggal Lahir <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::date('tanggal_lahir', $data->tanggal_lahir, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <div class="form-group">
                                            <h5>Agama <span class="text-danger">*</span></h5>
                                            <select name="agama" class="form-control select2">
                                                <option {{ $data->agama == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                                                <option {{ $data->agama == 'kristen' ? 'selected' : '' }} value="kristen">kristen</option>
                                                <option {{ $data->agama == 'protestan' ? 'selected' : '' }} value="protestan">Protestan</option>
                                                <option {{ $data->agama == 'hindu' ? 'selected' : '' }} value="hindu">Hindu</option>
                                                <option {{ $data->agama == 'budha' ? 'selected' : '' }} value="budha">Budha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ayah <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ayah', $data->nama_ayah, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>Nama Ibu <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    {!! Form::text('nama_ibu', $data->nama_ibu, ['class' => 'form-control']) !!}
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
                    <div class="pull-right">
                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</form>