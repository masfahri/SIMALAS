  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit </h5>
          <input type="button" class="btn btn-success" value="x" data-dismiss="modal">
          {{-- <button class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.master.mapel.update') }}" method="post">
                @csrf
                <div class="form-group">
                  <h5>Nama Mata Pelajaran <span class="text-danger">*</span></h5>
                  <div class="controls">
                    {!! Form::text('nama_mapel', '', ['class' => 'form-control', 'id' => 'nama_mapel']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <h5>Kode <span class="text-danger">*</span></h5>
                  <div class="controls">
                    {!! Form::text('summon', '', ['class' => 'form-control', 'id' => 'summon']) !!}
                  </div>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary float-right">
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->