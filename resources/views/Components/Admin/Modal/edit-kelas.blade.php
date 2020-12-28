  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Kelas</h5>
          <input type="button" class="btn btn-success" value="x" data-dismiss="modal">
          {{-- <button class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.master.kelas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <h5>Kelas <span class="text-danger">*</span></h5>
                    <div class="controls">
                        {!! Form::select('kd_kelas', $kelas, null, ['class' => 'form-control select2', 'id' => 'kd_kelas']) !!}
                    </div>
                </div>
                
                <div class="form-group">
                  @if (count($jurusan) == 0)
                    {!! Form::hidden('kd_jurusan', '0', null) !!}  
                  @else
                    <h5>Jurusan <span class="text-danger">*</span></h5>
                    <div class="controls">
                      {!! Form::select('kd_kelas', $jurusan, null, ['class' => 'form-control select2']) !!}
                    </div>
                  @endif
                </div>

                <div class="form-group">
                  <h5>Sub Kelas <span class="text-danger">*</span></h5>
                  <div class="controls">
                      {!! Form::select('kd_sub_kelas', $subKelas, null, ['class' => 'form-control select2', 'id' => 'kd_sub_kelas']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <h5>Guru Kelas <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="kd_guru" class="form-control select2 id-guru" id="id-guru">
                      <option value="">Pilih Guru Kelas</option>
                      @foreach ($guru as $item)
                          <option value="{{ $item->kd_guru }}">{{ $item->GuruToUser->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary float-right">
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->