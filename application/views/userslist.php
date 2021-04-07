<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">
  <!-- <title>EIB</title> -->
	<?php $this->load->view('common_style'); ?>
	<link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>plugins/selectize/css/selectize.default.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>plugins/nestable/jquery.nestable.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/footable/css/footable.bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/footable/css/FooTable.FontAwesome.css" rel="stylesheet" />

	<style>
	.emp_image1, .emp_image2, .emp_image3, .emp_image4, .emp_image5, .emp_image6{
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
	</style>
</head>
<body class="fixed-left">
	<!-- Begin page -->
	<div id="wrapper" class="enlarged forced">
		<!-- Top Bar Start -->
		<div class="topbar">
		</div>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<div class="left side-menu">
		</div>
		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">Performance Process</h4>
							<ol class="breadcrumb"></ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">

							<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

							<div class="card-box table-responsive export_table3">
								<table id="list_table" class="table table-bordered"  style="width:100%">
											<thead>
													<tr>
															<th>Name</th>
															<th>Email</th>
															<th>User Name</th>
															<th>Mobile Number</th>
															<th>DOB</th>
															<th>Status</th>
															<th>Created date</th>
															<th>Modified Date</th>
															<th>Action</th>


													</tr>
											</thead>
											<tbody>
											</tbody>
									</table>
							</div>


					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="CenterModal_letter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel-letter" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-full">
					<div class="modal-content">
							<div class="modal-header">
									<h4 class="modal-title" id="full-width-modalLabel-letter">Performance Letter</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="emp_image2" style="display:none"></div>
							<div class="modal-body">
							</div>
							<div class="modal-footer">
	                <button type="button" class="ladda-button btn btn-primary  form_buttons" id="save_performance_letter" data-style="expand-right">Submit</button>
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	            </div>
					</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div>
</div><!-- wrapper -->

		<?php $this->load->view('common_script'); ?>
		<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
		<script src="<?php echo base_url(); ?>plugins/select2/js/select2.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>plugins/selectize/js/standalone/selectize.js"></script>
		<script src="<?php echo base_url(); ?>plugins/selectize/js/standalone/index.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<!-- Buttons examples -->
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
		<!-- Key Tables -->
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
		<!-- Responsive examples -->
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		<!-- Selection table -->
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.select.min.js"></script>
		<script>
		// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
		$.fn.dataTable.pipeline = function ( opts ) {
		  // Configuration options
		  var conf = $.extend( {
		    pages: 5,     // number of pages to cache
		    url: '',      // script url
		    data: null,   // function or object with parameters to send to the server
		    // matching how `ajax.data` works in DataTables
		    method: 'GET' // Ajax HTTP method
		  }, opts );

		  // Private variables for storing the cache
		  var cacheLower = -1;
		  var cacheUpper = null;
		  var cacheLastRequest = null;
		  var cacheLastJson = null;

		  return function ( request, drawCallback, settings ) {
		    var ajax          = false;
		    var requestStart  = request.start;
		    var drawStart     = request.start;
		    var requestLength = request.length;
		    var requestEnd    = requestStart + requestLength;

		    if ( settings.clearCache ) {
		      // API requested that the cache be cleared
		      ajax = true;
		      settings.clearCache = false;
		    }
		    else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
		      // outside cached data - need to make a request
		      ajax = true;
		    }
		    else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
		    JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
		    JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
		  ) {
		    // properties changed (ordering, columns, searching)
		    ajax = true;
		  }

		  // Store the request for checking next time around
		  cacheLastRequest = $.extend( true, {}, request );

		  if ( ajax ) {
		    // Need data from the server
		    if ( requestStart < cacheLower ) {
		      requestStart = requestStart - (requestLength*(conf.pages-1));

		      if ( requestStart < 0 ) {
		        requestStart = 0;
		      }
		    }

		    cacheLower = requestStart;
		    cacheUpper = requestStart + (requestLength * conf.pages);

		    request.start = requestStart;
		    request.length = requestLength*conf.pages;

		    // Provide the same `data` options as DataTables.
		    if ( typeof conf.data === 'function' ) {
		      // As a function it is executed with the data object as an arg
		      // for manipulation. If an object is returned, it is used as the
		      // data object to submit
		      var d = conf.data( request );
		      if ( d ) {
		        $.extend( request, d );
		      }
		    }
		    else if ( $.isPlainObject( conf.data ) ) {
		      // As an object, the data given extends the default
		      $.extend( request, conf.data );
		    }

		    settings.jqXHR = $.ajax( {
		      "type":     conf.method,
		      "url":      conf.url,
		      "data":     request,
		      "dataType": "json",
		      "cache":    false,
		      "success":  function ( json ) {
		        cacheLastJson = $.extend(true, {}, json);

		        if ( cacheLower != drawStart ) {
		          json.data.splice( 0, drawStart-cacheLower );
		        }
		        if ( requestLength >= -1 ) {
		          json.data.splice( requestLength, json.data.length );
		        }

		        drawCallback( json );
		      }
		    } );
		  }
		  else {
		    json = $.extend( true, {}, cacheLastJson );
		    json.draw = request.draw; // Update the echo for each response
		    json.data.splice( 0, requestStart-cacheLower );
		    json.data.splice( requestLength, json.data.length );

		    drawCallback(json);
		  }
		}
		};

		// Register an API method that will empty the pipelined data, forcing an Ajax
		// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
		$.fn.dataTable.Api.register( 'clearPipeline()', function () {
		  return this.iterator( 'table', function ( settings ) {
		    settings.clearCache = true;
		  } );
		} );

		var csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
		var csrfHash = $('.txt_csrfname').val(); // CSRF hash
		$(document).ready(function (){
				loadDataTable();
		});
		function loadDataTable(){
			$('#list_table').DataTable({
					"processing": true,
					"serverSide": true,
					"rowId": 'DT_RowId',
					"bSort": false,
					"bDestroy": true,
					drawCallback: function(settings) {
						 var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
						 pagination.toggle(this.api().page.info().pages > 1);
					 },
					"ajax": $.fn.dataTable.pipeline({
							url: '<?php echo base_url();?>login/getList',
							pages: 5, // number of pages to cache
							headers: {
								csrfName : csrfHash
							}
					})
			});
		}





		</script>
</body>
</html>
