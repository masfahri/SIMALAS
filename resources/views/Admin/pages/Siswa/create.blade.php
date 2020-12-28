@extends('layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Tambah Guru</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item">Master</li>
                              <li class="breadcrumb-item">Guru</li>
                              <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content">
        @component('Components.Admin.Form.Siswa.create', [
            'route' => route('admin.master.siswa.store'),
            'provinces' => $provinces
        ]);
        @endcomponent
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
	
	<!-- EduAdmin App -->
	<script src="{{ asset('v1/js/template.js') }}"></script>
		
    <script src="{{ asset('v1/js/pages/validation.js') }}"></script>
    <script src="{{ asset('v1/js/pages/form-validation.js') }}"></script>
    <script src="{{ asset('v1/vendor_components/select2/dist/js/select2.full.js') }}"></script>

    <script>
        $('.select2').select2();
    </script>
@endsection