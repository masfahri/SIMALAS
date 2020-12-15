@extends('layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Form Validation</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Forms</li>
                              <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Form Validation</h4>
            <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form novalidate>
                    <div class="row">
                      <div class="col-12">						
                          <div class="form-group">
                              <h5>Basic Text Input <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
                              <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                          </div>
                          <div class="form-group">
                              <h5>Email Field <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                          </div>
                          <div class="form-group">
                              <h5>Password Input Field <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                          </div>
                          <div class="form-group">
                              <h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="password" name="password2" data-validation-match-match="password" class="form-control" required> </div>
                          </div>
                          <div class="form-group">
                              <h5>File Input Field <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="file" name="file" class="form-control" required> </div>
                          </div>
                          <div class="form-group">
                              <h5>Input with Icon <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Addon To Right" data-validation-required-message="This field is required"> <span class="input-group-addon" id="basic-addon1"><i class="fa fa-dollar"></i></span> </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <h5>Maximum Character Length <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="maxChar" class="form-control" required data-validation-required-message="This field is required" maxlength="10">
                              </div>
                              <div class="form-control-feedback"><small>Add <code>maxlength='10'</code> attribute for maximum number of characters to accept. </small></div>
                          </div>
                          <div class="form-group">
                              <h5>Minimum Character Length <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="minChar" class="form-control" required data-validation-required-message="This field is required" minlength="6">
                              </div>
                              <div class="form-control-feedback"><small>Add <code>minlength="6"</code> attribute for minimum number of characters to accept.</small></div>
                          </div>
                          <div class="form-group">
                              <h5>Only Numbers <span class="text-danger">*</span></h5>
                              <div class="input-group"> <span class="input-group-addon">$</span>
                                  <input type="number" name="onlyNum" class="form-control" required data-validation-required-message="This field is required"> <span class="input-group-addon">.00</span> </div>
                          </div>
                          <div class="form-group">
                              <h5>Maximum Number <span class="text-danger">*</span></h5>
                              <input type="number" name="maxNum" class="form-control" required data-validation-required-message="This field is required" max="25">
                              <div class="form-control-feedback"> <small><i>Must be lower than 25</i></small> - <small>Add <code>max</code> attribute for maximum number to accept. Also use <code>data-validation-max-message</code> attribute for max failure message</small> </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group">
                              <h5>Minimum Number <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="number" name="minNum" class="form-control" required data-validation-required-message="This field is required" min="10">
                              </div>
                              <div class="form-control-feedback"><small><i>Must be higher than 10</i></small> - <small>Add <code>min</code> attribute for minimum number to accept. Also use <code>data-validation-min-message</code> attribute for min failure message</small></div>
                          </div>
                          <div class="form-group">
                              <h5>Text Input Range <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required" minlength="10" maxlength="20" placeholder="Enter number between 10 &amp; 20"> </div>
                          </div>
                          <div class="form-group">
                              <h5>Input with Button <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Search" required> 
                                      <span class="input-group-append">
                                        <button class="btn btn-info btn-sm" type="button">Go!</button>
                                      </span> </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <h5>No Characters, Only Numbers <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="noChar" class="form-control" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers"> </div>
                          </div>
                          <div class="form-group">
                              <h5>Pattern <span class="text-danger">*</span> <small><i>Must start with 'a' and end with 'z'</i></small></h5>
                              <div class="controls">
                                  <input type="text" name="pattern" pattern="a.*z" data-validation-pattern-message="Must start with 'a' and end with 'z'" class="form-control" required>
                                  <div class="form-control-feedback"><small>Add <code>pattern</code> attribute to set input pattern. Also use <code>data-validation-pattern-message</code> attribute for pattern failure message</small></div>
                              </div>
                          </div>
                          <div class="form-group">
                              <h5>Enter URL <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" class="form-control" placeholder="Add URL" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's">
                                  <div class="form-control-feedback"><small>Add <code>data-validation-regex-regex</code> attribute for regular expression. Also use <code>data-validation-regex-message</code> attribute for regex failure message</small></div>
                              </div>
                          </div>
                          <div class="form-group">
                              <h5>Enter Email Address <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email"> </div>
                          </div>
                          <div class="form-group">
                              <h5>Enter Date <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="date" name="date" class="form-control" required data-validation-required-message="This field is required"> </div>
                              <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>

                          </div>
                          <div class="form-group">
                              <h5>Basic Select <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="select" id="select" required class="form-control">
                                      <option value="">Select Your City</option>
                                      <option value="1">India</option>
                                      <option value="2">USA</option>
                                      <option value="3">UK</option>
                                      <option value="4">Canada</option>
                                      <option value="5">Dubai</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <h5>Textarea <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                              </div>
                          </div>
                      </div>
                    </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Checkbox <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="checkbox" id="checkbox_1" required value="single">
                                      <label for="checkbox_1">Check this custom checkbox</label>
                                  </div>								
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_2" required value="x">
                                          <label for="checkbox_2">I am unchecked Checkbox</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_3" value="y">
                                          <label for="checkbox_3">I am unchecked too</label>
                                      </fieldset>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_4" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required>
                                          <label for="checkbox_4">I am unchecked Checkbox</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_5">
                                          <label for="checkbox_5">I am unchecked too</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_6">
                                          <label for="checkbox_6">You can check me</label>
                                      </fieldset>
                                  </div> <small>Select any 2 options</small> </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_7" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="styled_min_checkbox" required>
                                          <label for="checkbox_7">I am unchecked Checkbox</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_8" value="2">
                                          <label for="checkbox_8">I am unchecked too</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_9" value="3">
                                          <label for="checkbox_9">You can check me</label>
                                      </fieldset>
                                  </div> <small>Select any 2 options</small> </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Radio Buttons <span class="text-danger">*</span></h5>
                                  <fieldset class="controls">
                                      <input name="group1" type="radio" id="radio_1" value="1" required>
                                      <label for="radio_1">Check Me</label>
                                  </fieldset>
                                  <fieldset>
                                      <input name="group1" type="radio" id="radio_2" value="2">
                                      <label for="radio_2">Or Me</label>									
                                  </fieldset>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <fieldset>
                                          <input name="group2" type="radio" id="radio_3" value="Yes" required>
                                          <label for="radio_3">Check Me</label>
                                      </fieldset>
                                      <fieldset>
                                          <input name="group2" type="radio" id="radio_4" value="No">
                                          <label for="radio_4">Or Me</label>
                                      </fieldset>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="text-xs-right">
                          <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

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
@endsection