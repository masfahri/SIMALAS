  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.master.kelas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                    <div class="controls">
                        {!! Form::select('tempat_lahir', $kelas, null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary float-right">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->