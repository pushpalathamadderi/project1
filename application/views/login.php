<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $page_desc; ?>">
  <meta name="author" content="Coderthemes">
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <title><?php echo $page_title; ?></title>
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script>
  var base_url = '<?php echo base_url(); ?>';
  </script>

</head>
<body>

  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class="card-box">
      <div class="panel-heading">
      </div>
      <div class="p-20">
        <div class="error" id="form-div"> <label> </label></div>
        <?php echo form_open(base_url().'login/validateCredentials', array('id'=>'frm_login', 'method'=>'post')); ?>
            <div class="form-group">
                <input type="hidden" name="logintype" id="logintype" value="Employee" />
                <label for="exampleInputEmail1">UserName<span class="text-danger">*</span></label>
                <input parsley-trigger="change" required class="form-control" id="username" name="username" type="text"  placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password<span class="text-danger">*</span></label>
                <input parsley-trigger="change" required class="form-control" id="password" name="password" type="password" placeholder="Password">
            </div>
            <div class="form-group text-center m-t-40">
                <div class="col-12">
                  <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" id=""> Log In </button>
                </div>
            </div>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</body>
</html>
