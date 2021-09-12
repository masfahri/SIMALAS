@extends('layouts.app')
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
                              <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            @component('Components.Admin.Table.siswa', [
                'pageTitle' => $pageTitle,
                'data'      => $data,
                'route'     => array(
                    'export' => route('admin.master.siswa.export'),
                    'import' => route('admin.master.siswa.import'),
                    'create' => route('admin.master.siswa.create')
                ),
                'th'        => array('NIS', 'Nama', 'Email', 'Foto', 'Aksi')
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
	
	<!-- EduAdmin App -->
	<script src="{{ asset('v1/js/template.js') }}"></script>
	
    <script src="{{ asset('v1/js/pages/data-table.js') }}"></script>
    <script>
        $('#import').click(function (e) { 
            e.preventDefault();
            if($('#form-import:visible').length == 0)
            {
                
                $('#form-import').show('slow');
            }else{
                $('#form-import').hide('slow');

            }
        });
    </script>
    
@endsection