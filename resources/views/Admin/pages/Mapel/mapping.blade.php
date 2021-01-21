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
                              <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
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
            @component('Components.Admin.Table.mapping-mapel-to-guru', [
                'pageTitle' => $pageTitle,
                'data'      => $data,
                'matapelajaran' => $matapelajaran,
                'gurus'      => $guru,
                'th'        => array('Kode Guru', 'Nama Guru', 'Aksi')
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
    
    <script src="{{ asset('v1/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/select2/dist/js/select2.full.js') }}"></script>
	<script src="{{ asset('v1/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('v1/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('v1/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('v1/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('v1/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('v1/vendor_plugins/iCheck/icheck.min.js') }}"></script>

	
	<!-- EduAdmin App -->
    <script src="{{ asset('v1/js/template.js') }}"></script>
    <script src="{{ asset('v1/js/pages/advanced-form-element.js') }}"></script>

	
    <script src="{{ asset('v1/js/pages/data-table.js') }}"></script>
@endsection