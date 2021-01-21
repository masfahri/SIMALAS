  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-mapping_guru-To-Mapel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Guru ke Mata Pelajaran</h5>
          <input type="button" class="btn btn-success" value="x" data-dismiss="modal">
          {{-- <button class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.master.mapel.mapping.store') }}" method="post">
                @csrf
                {!! Form::hidden('kd_mapel', Request::segment(6), [null]) !!}
                <div class="form-group">
                    <label>Multiple</label>
                    <select class="form-control select2" multiple="multiple" name="kd_guru[]" data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($guru as $item)
                            <option value="{{ App\Models\GuruModel::where('user_id', $item->GuruToUser->id)->first()->kd_guru }}">{{ App\Models\GuruModel::where('user_id', $item->GuruToUser->id)->first()->kd_guru }} - {{ $item->GuruToUser->name }}</option>
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