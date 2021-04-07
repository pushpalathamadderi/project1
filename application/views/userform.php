<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="author" content="Coderthemes">
	<!-- <title>EIB</title> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/jquery.steps/css/jquery.steps.css" />
	<link href="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>plugins/selectize/css/selectize.default.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>

	<style>
	.emp_image{
		/* display:    none; */
	position:   fixed;
	z-index:    1000;
	top:        0;
	left:       0;
	height:     100%;
	width:      100%;
	background: rgba( 255, 255, 255, .8 )
							url('<?php echo base_url(); ?>assets/images/loader.gif')
							50% 50%
							no-repeat;
	}
	.month_year .show {
			max-height: 196px !important;
	}
	.month_year .show ul {
			max-height: 120px !important;
	}
	</style>
</head>
<body class="fixed-left">
	<!-- Begin page -->
	<div id="wrapper" class="enlarged forced">
		<!-- Top Bar Start -->
		<div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
        <div class="text-center">
        </div>
      </div>
      <!-- Button mobile view to collapse sidebar menu -->
      <nav class="navbar-custom">

        <ul class="list-inline menu-left mb-0">
          <li class="float-left">
            <button class="button-menu-mobile open-left waves-light waves-effect">
            </button>
          </li>
          </li>
        </ul>
      </nav>

		</div>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
          <ul>
						<li class="has_sub"><a href="<?php echo base_url().'adduser';?>" class="waves-effect"> <i class="fa fa-users"></i> <span> Add User</span></a></li>
						<li class="has_sub"><a href="<?php echo base_url().'userslist';?>" class="waves-effect"> <i class="md-select-all"></i> <span>Users List</span></a></li>

          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>		</div>
		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">Create User</h4>
							<ol class="breadcrumb"></ol>
						</div>
					</div>
					<form id="user_form">
						<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<div id="response1"></div>
							<div class="form-group row">
								<div class="col-6">
										<div class="form-group row">
											<label class="col-md-6">Name <span class="text-danger">*</span></label>
											<div class="col-6 month_year">
												<input class="form-control" type="text" name="name" id="name" value="" field="required">
											</div>
										</div>
									</div>
									<div class="col-6">
											<div class="form-group row">
												<label class="col-md-6">Email <span class="text-danger">*</span></label>
												<div class="col-6 month_year">
													<input class="form-control" type="text" name="email" id="email" value="" field="required">
												</div>
											</div>
										</div>

										<div class="col-6">
												<div class="form-group row">
													<label class="col-md-6">User name <span class="text-danger">*</span></label>
													<div class="col-6 month_year">
														<input class="form-control" type="text" name="username" id="username" value="" field="required">
													</div>
												</div>
											</div>
											<div class="col-6">
													<div class="form-group row">
														<label class="col-md-6">Password <span class="text-danger">*</span></label>
														<div class="col-6 month_year">
															<input class="form-control" type="text" name="password" id="password" value="" field="required">
														</div>
													</div>
												</div>
												<div class="col-6">
														<div class="form-group row">
															<label class="col-md-6">Confirm Password <span class="text-danger">*</span></label>
															<div class="col-6 month_year">
																<input class="form-control" type="text" name="confirm_password" id="confirm_password" value="" field="required">
															</div>
														</div>
													</div>
											<div class="col-6">
													<div class="form-group row">
														<label class="col-md-6">Mobile Number <span class="text-danger">*</span></label>
														<div class="col-6 month_year">
															<input class="form-control number" maxlength="10" type="text" name="mobile_number" id="mobile_number" value="" field="required">
														</div>
													</div>
												</div>
												<div class="col-6">
														<div class="form-group row">
															<label class="col-md-6">DOB<span class="text-danger">*</span></label>
															<div class="col-6 month_year">
																<input class="form-control" type="text" name="dob" id="dob" value="" field="required">
															</div>
														</div>
													</div>
													<div class="col-6">
															<div class="form-group row">
																<label class="col-md-6">Address<span class="text-danger">*</span></label>
																<div class="col-6 month_year">
																	<input class="form-control" type="text" name="address" id="address" value="" field="required">
																</div>
															</div>
														</div>
														<div class="col-6">
																<div class="form-group row">
																	<label class="col-md-6">City<span class="text-danger">*</span></label>
																	<div class="col-6 month_year">
																		<input class="form-control" type="text" name="city" id="city" value="" field="required">
																	</div>
																</div>
															</div>
															<div class="col-6">
																	<div class="form-group row">
																		<label class="col-md-6">State<span class="text-danger">*</span></label>
																		<div class="col-6 month_year">
																			<input class="form-control" type="text" name="state" id="state" value="" field="required">
																		</div>
																	</div>
																</div>
																<div class="col-6">
																		<div class="form-group row">
																			<label class="col-md-6">Country<span class="text-danger">*</span></label>
																			<div class="col-6 month_year">
																				<input class="form-control" type="text" name="country" id="country" value="" field="required">
																			</div>
																		</div>
																	</div>
												<?php  if(isset($basic_det['emp_image']) && $basic_det['emp_image']!=''){
								          if(file_exists(UPLOADPROFILEPIC.$basic_det['emp_image'])){
								            $empimage =  base_url().UPLOADPROFILEPIC.$basic_det['emp_image'] ;
								          }else{
								            if($basic_det['gender'] == 1){
								              $gender = "Male";
								            }else{
								              $gender = "Female";
								            }
								            $empimage =  "../assets/images/".$gender.".png";
								          }
								        } else{
								          if(isset($basic_det['gender']) && $basic_det['gender'] == 1){
								            $gender = "Male";
								          }else{
								            $gender = "Female";
								          }
								          $empimage =  "../assets/images/".$gender.".png";
								        }  ?>
												<div class="col-6">
														<div class="form-group row">
															<label class="col-md-6">Profile Picture <span class="text-danger">*</span></label>

																<div class="col-3 month_year">
																	<input accept="image/gif, image/jpeg, image/png" class="form-control" id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();" />
																</div>
																<div class="col-3 month_year">
																	<img class="form-control" id="uploadPreview" style="width: 100px; height: 100px;" field= "required" />
																	</div>
													</div>


							</div>




					</div>
					<div class="form-group col-md-12 text-right ">
					<button type="button"class="ladda-button btn btn-secondary" name="resetform" id="resetform" data-style="expand-left"><span class="ladda-label">
								Reset</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
							<button type="button"class="ladda-button btn btn-success" name="submit_form" id="submit_form" data-style="expand-left"><span class="ladda-label">
								Submit</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<script>
			var resizefunc = [];
	</script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
	<script src="<?php echo base_url(); ?>plugins/moment/moment.js"></script>
	<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.js"></script>
	<script src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
	<script src="<?php echo base_url(); ?>plugins/select2/js/select2.min.js" type="text/javascript"></script>


	<script>
	var csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
	var csrfHash = $('.txt_csrfname').val(); // CSRF hash

	$('#dob').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: "dd-mm-yyyy",
		viewMode: "months",
		minViewMode: "months",
	});
	$(".number").keydown(function (evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if ((charCode < 48 || charCode > 57) && (charCode < 96 || charCode > 105) && charCode != 8 && charCode != 9 )
		return false;
		return true;
	});
	//submit form
	$(document).on('click', '#submit_form', function(){
		var myform = $('#user_form');var error=0;
		var get_all_data=jQuery('#user_form select, #user_form textarea, #user_form input[type=\'text\'], #user_form input[type=\'hidden\']')
		$.each(get_all_data, function(key, value){
			if(jQuery(this).val().length===0 && jQuery(this).attr('field')=="required"){
				$(this).addClass('parsley-error');
				$(this).parent('div').children("button").addClass("parsley-error");
				error=1;
			}else{
				$(this).removeClass('parsley-error');
				$(this).parent("div").children("button").removeClass('parsley-error');
			}
		});

		// serialize the form
		var form_data = myform.serialize();

		//if (jQuery(this).attr("type") == "file") {
			// if (jQuery(this).val().length != 0) {
				if ($('#uploadImage').val().length != 0){

					 form_data = $("#user_form")[0]);

					$('#uploadImage').removeClass('parsley-error');
					$('#uploadImage').parent("div").children("button").removeClass('parsley-error');
				}else{
					$('#uploadImage').addClass('parsley-error');
				$('#uploadImage').parent('div').children("button").addClass("parsley-error");
				}

			//}
		//}
		if(error==1){
			alert('Please fill all the details ');
			return false;
		} else{
			var psw=$('#password').val();
			var confirm_psw=$('#confirm_password').val();
			if(psw!=confirm_psw){
				alert('Password should be same');
				return false;
			}
			if(confirm('Are you sure you want to add user')){
				$('#submit_form').css('pointer-events', 'none');
				$.ajax({
					type:"POST",
					url:'<?php echo base_url(); ?>login/submitUserDetails',
					data:form_data,
							processData: false,
		contentType: false,
					beforeSend: function(){
							$('.emp_image').css("display","block");
					},
					complete: function(){
								$('.emp_image').css("display","none");
						},
					success:function(response){
						res=JSON.parse(response);
						if(response.status == 1){
							$('#response').html('<div class="alert alert-success"><span>'+res.msg+'<span></div>');
						}else{
							$('#response').html('<div class="alert alert-success"><span>'+res.msg+'<span></div>');
						}
						$(window).scrollTop(0);
						$('#submit_form').css('pointer-events', 'auto');
						resetForm('#user_form');
						setTimeout(function(){
							$(".alert").hide();
						},9000);
					}
				});
			}

		}
	});
	$(document).on('click','#resetform', function(){
		resetForm('#user_form');
	});
	function resetForm(form_id){
		var get_all_data=jQuery(form_id +' input[type=\'text\'], '+ form_id +' input[type=\'hidden\']')
		$(form_id)[0].reset();
		$.each(get_all_data, function(key, value){
			$(this).removeClass('parsley-error');
			$(this).parent("div").children("button").removeClass('parsley-error');
		});
		$('#uploadPreview').val('');
	}

	function PreviewImage() {
			 var oFReader = new FileReader();
			 oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

			 oFReader.onload = function (oFREvent) {
					 document.getElementById("uploadPreview").src = oFREvent.target.result;
			 };
	 };
</script>

</body>
</html>
