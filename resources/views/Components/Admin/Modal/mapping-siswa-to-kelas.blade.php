  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Siswa ke Kelas</h5>
          <input type="button" class="btn btn-success" value="x" data-dismiss="modal">
          {{-- <button class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.master.siswa.mapping.store') }}" method="post">
                @csrf
                {!! Form::hidden('kd_kelas', Request::segment(6), [null]) !!}
                <div class="form-group">
                    <label>Multiple</label>
                    <select class="form-control select2" multiple="multiple" name="kd_siswa[]" data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($siswa as $item)
                            <option value="{{ $item->SiswaToUser->Siswa->kd_siswa }}">{{ $item->SiswaToUser->Siswa->kd_siswa }} - {{ $item->SiswaToUser->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary float-right">
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->