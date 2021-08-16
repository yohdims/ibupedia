<?php
        $poli_tujuan = array("Poli Umum","Poli KIA");

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?= base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url();?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url();?>css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="<?= base_url();?>css/style.css" rel="stylesheet" type="text/css">
<link href="<?= base_url();?>css/pages/signin.css" rel="stylesheet" type="text/css">
<link href="<?= base_url()?>css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner" style="background-color: blue">
    <div class="container"> 
      <div class="pull-left" style="margin-right: 10px">
        <img src="<?= $this->M_1Setting->getLogo();?>" width="75px">
      </div>
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">
          <h2>Ibu Pedia</h2>
        <h4></h4>
        </a>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<div class="account-container">
  
  <div class="content clearfix">
    
    <form action="<?= base_url(); ?>auth/login" method="post">
    <!-- <form action="<?= base_url(); ?>api/login" method="post"> -->
    
      <h1>Login Form</h1>   
      
      <div class="login-fields">
        
        
        <div class="field">
          <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" required />
        </div> <!-- /field -->
        
        <div class="field">
          <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field" required/>
        </div> <!-- /password -->
        
        
      </div> <!-- /login-fields -->
      
      <div class="login-actions">
                  
        <button class="button btn btn-primary ">Sign In</button>
        
      </div> <!-- .actions -->
       <?= $this->session->flashdata('message'); ?> 
      
      
    </form>
    
  </div> <!-- /content -->
  
</div> <!-- /account-container -->



<div class="login-extra">
  <!-- <a href="#">Reset Password</a> -->
</div> <!-- /login-extra -->


<script src="<?= base_url();?>js/jquery-1.7.2.min.js"></script>
<script src="<?= base_url();?>js/bootstrap.js"></script>

<script src="<?= base_url();?>js/signin.js"></script>

</body>

</html>
