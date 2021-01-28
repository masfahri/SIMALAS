@extends('layouts.app')
@section('css')
<style>
    .select2 {
        width: 100% !important;
    }
</style>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data {{ $pageTitle }}</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Tabel</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Kelas</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
          {{-- @if (session('success'))
              <center><span class="badge badge-success w-100" style="padding: 4px; margin: 10px;">{{ session('success') }}</span></center>
          @endif
          @if (session('error'))
              <center><span class="badge badge-danger w-100" style="padding: 4px; margin: 10px;">{{ session('error') }}</span></center>
          @endif --}}
        <div class="row">
          <div class="col-12">
            @component('Components.Admin.Table.kelas', [
                'pageTitle'           => $pageTitle,
                'kelasSubJurusan'     => $kelasSubJurusan,
                'kelas'               => $kelas,
                'guru'                => $guru,
                'jurusan'             => $jurusan,
                'subKelas'            => $sub_kelas,
                'route'               => array(
                    'create' => route('admin.master.kelas.create')
                ),
                'th'                  => array('Kelas', 'Wali Kelas', 'Jumlah Siswa', 'Aksi')
            ]);
            @endcomponent   
          </div> 
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
	<!-- Page Content overlay -->
	
	<!-- Vendor JS -->
	<script src="{{ asset('v1/js/vendors.min.js') }}"></script>
	<script src="{{ asset('v1/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('v1/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('v1/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('v1/vendor_components/select2/dist/js/select2.full.js') }}"></script>

	
	<!-- EduAdmin App -->
	<script src="{{ asset('v1/js/template.js') }}"></script>
	
    <script src="{{ asset('v1/js/pages/data-table.js') }}"></script>
    <script>
        $('.select2').select2();
        $(document).on('click', '#edit-kelas', function () {
            var id = $(this).data('id');
            var ajaxUrl = "{{ route('admin.master.kelas.edit', ':id') }}";
            ajaxUrl = ajaxUrl.replace(':id', id);
            $.ajax({
                type: "GET",
                url: ajaxUrl,
                data: null,
                dataType: "json",
                success: function (response) {
                    console.log(response.kd_sub_kelas)
                    $('#id').val(""+response.id+"").trigger("change");;
                    $('#id-guru').val(""+response.kd_guru+"").trigger("change");;
                    $('#kd_sub_kelas').val(""+response.kd_sub_kelas+"").trigger("change");;
                    $('#kd_kelas').val(""+response.kd_kelas+"").trigger("change");;
                }
            });
            $('#modal-edit').show('fast')
        })
    </script>
@endsection