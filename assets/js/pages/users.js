
  var csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
  var csrfHash = $('.txt_csrfname').val(); // CSRF hash

$(document).on('click', '#btnadd', function(){
  $('#CenterModal').modal('show');
    $.ajax({
        url: base_url + 'User/addUserView',
        method: 'post',
        dataType : 'json',
        data: {[csrfName]:csrfHash},
        beforeSend: function(){
            $('.emp_image1').css("display","block");
        },
        complete: function(){
            $('.emp_image1').css("display","none");
        },
        success: function (response)
        {
            $('.modal-body').html(response);
            refreshSelectBox("roles");
        }
    });
});

  var changes = false;
 $(document).on('change', '#myDiv', function(){
   changes = true;
 });
 //var changes1 = false;
 $(document).on('change', '#myDiv2', function(){
   changes = true;
 });
$(document).on('click', '#btnsubmit', function(){
  var error =0;
  var get_data=$('#frm_roles input[type=\'text\'], #frm_roles input[type=\'hidden\'], #frm_roles select');
  var form_data = $('#frm_roles').serialize();
  $.each(get_data, function (key, value) {
    if ($(this).val().length === 0 && $(this).attr("field") == 'required') {
         $(this).parent("div").children("button").addClass("parsley-error");
         $(this).addClass("parsley-error");
         error = 1;
     } else {
         $(this).parent("div").children("button").removeClass("parsley-error");
         $(this).removeClass("parsley-error");
     }
  });
  if(error==1){
      return false;
  } else {
    $.ajax({
      type : 'POST',
      url : base_url + 'User/add',
      data : form_data+'&'+csrfName+'='+csrfHash,
      dataType : 'json',
      beforeSend: function(){
          $('.emp_image1').css("display","block");
      },
      complete: function(){
          $('.emp_image1').css("display","none");
      },
      success: function(data){
        $("#form-div").removeClass('alert-success');
        $("#form-div").removeClass('alert-danger');
        if(data.status == 0){
            $("#form-div").show();
            $("#form-div").addClass('alert-success');
            $("#form-div label").html(data.message);
            setTimeout(function(){
                $("#form-div").hide();
            }, 4000);
            $("#frm_roles")[0].reset();
        }else{
            $("#form-div").show();
            $("#form-div").addClass('alert-danger');
            $("#form-div label").html(data.message);

        }
        dataTableLoad();
      }
    });
  }
});
  $(document).on('click', '.edit_role', function(){
    //$(".modal-body-edit").html('<div style="height:200px; line-height:100px;  text-align:center; "><span style="color:#337ab7; font-weight:bold; "><img src="' + base_url + 'assets/images/sp-loading.gif">&nbsp;Loading</span></div>');
    $.ajax({
        url: base_url + 'User/editUserView',
        method: 'post',
        data : {'emp_id': $(this).attr("data-id"), [csrfName]:csrfHash},
        dataType : 'json',
        beforeSend: function(){
            $('.emp_image2').css("display","block");
        },
        complete: function(){
            $('.emp_image2').css("display","none");
        },
        success: function (response)
        {
          $('.modal-body-edit').html(response);
          refreshSelectBox("role");
          refreshSelectBox("status");
        }
    });
  });


$(document).on('click', '#btnedit', function(){
  if(changes){
    changes   = false;
    var error =0;
    var get_data=$('#frm_roles_edit input[type=\'text\'], #frm_roles_edit input[type=\'hidden\'], #frm_roles_edit select');
    var form_data = $('#frm_roles_edit').serialize();
    $.each(get_data, function (key, value) {
      if ($(this).val().length === 0 && $(this).attr("field") == 'required') {
           $(this).parent("div").children("button").addClass("parsley-error");
           $(this).addClass("parsley-error");
           error = 1;
       } else {
           $(this).parent("div").children("button").removeClass("parsley-error");
           $(this).removeClass("parsley-error");
       }
    });
    if(error){
        return false;
    } else {
      $.ajax({
        type : 'POST',
        url : base_url + 'User/add/1',
        data : form_data+'&'+csrfName+'='+csrfHash,
        dataType : 'json',
        beforeSend: function(){
            $('.emp_image2').css("display","block");
        },
        complete: function(){
            $('.emp_image2').css("display","none");
        },
        success: function(data){
          $("#form-div").removeClass('alert-success');
          $("#form-div").removeClass('alert-danger');
          if(data.status == 0){
              $("#form-div").show();
              $("#form-div").addClass('alert-success');
              $("#form-div label").html(data.message);
              setTimeout(function(){
                  $("#form-div").hide();
              }, 4000);
          }else{
              $("#form-div").show();
              $("#form-div").addClass('alert-danger');
              $("#form-div label").html(data.message);
          }
          dataTableLoad();
        }
      });
    }
  }else{
    $("#form-div").show();
    $("#form-div").removeClass('response-msg alert-success alert-dismissible');
    $("#form-div").addClass('response-msg alert-danger alert-dismissible');
    $("#form-div label").html("No changes to update!");
    setTimeout(function(){
      $("#form-div").hide();
    }, 3000);
  }
});
  // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
  //
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


  //
  // DataTables initialisation
  //
  $(document).ready(function() {
      dataTableLoad();
  } );

  function dataTableLoad(){
      $('#example').DataTable( {
          "processing": true,
          "serverSide": true,
          "destroy": true,
          "ajax": $.fn.dataTable.pipeline( {
              url: base_url +'User/getuser',
              headers: {
                csrfName : csrfHash
              },
              pages: 5 // number of pages to cache
          } ),
          "columnDefs": [ {
              "targets": [0,6], /* column index */
              "orderable": true, /* true or false */
          }],
          "aaSorting": []
      } );
  }
