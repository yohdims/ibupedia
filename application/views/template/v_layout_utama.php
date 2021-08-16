
<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $judul_tab;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/select2.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/uniform.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-style.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-media.css" />
<link href="<?= base_url('assets/');?>font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="<?= base_url('assets/');?>css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div class="row-fluid">
  <div id="header">
    <div class="span2">
      <center>
        <img src="<?= $this->M_1Setting->getLogo();?>" class="" width="80px">
      </center>
    </div>
  </div>
</div>
<!--close-Header-part--> 
<div id="search">
  <!-- <input type="text" placeholder="Search here..."/> -->
  <input type="text" value="<?= $this->session->userdata("username")?>" readonly/>
  <input type="text" value="<?= $this->session->userdata("tgl_sekarang")?>" readonly/>
  
  <a title="" href="<?= base_url();?>/auth/logout">
    <button type="submit" class="tip-bottom" title="Logout"><i class="icon-share-alt icon-white"></i></button>
  </a>
</div>
<!--sidebar-menu-->
<div id="sidebar">
  <ul>
    <?php if ($this->session->userdata("hak_akses")=="admin"){?>
    <!-- ===== Admin ===== -->
    <li class="active"><a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li> <a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/admin"><i class="icon icon-user"></i> <span>Manajemen Admin</span></a> </li>
    <li> <a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/pengguna"><i class="icon icon-user"></i> <span>Manajemen Pengguna</span></a> </li>
    <li> <a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/anak"><i class="icon icon-user"></i> <span>Managemen Anak</span></a> </li>
    <li> <a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/tumbang"><i class="icon icon-user"></i> <span>Managemen Tumbuh Kembang</span></a> </li>
    <li> <a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/vaksin"><i class="icon icon-user"></i> <span>Managemen Vaksin</span></a> </li>
    <li> <a href="<?= base_url();?><?= $this->session->userdata('hak_akses')?>/mpasi"><i class="icon icon-user"></i> <span>Managemen MPASI</span></a> </li>
    <li> <a href="<?= base_url();?>/auth/logout"><i class="icon icon-user"></i> <span>Logout</span></a> </li>


    <?php } ?>
    
    
  </ul>
</div>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
    <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?= base_url();?>admin/" title="Go to Home" class="tip-bottom">
      <i class="icon-home"></i> Home
      </a>
    </div>
    <h1><?= $title; ?></h1>
  </div>
  <?php if (!empty( $this->session->flashdata('message'))):?>
      <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <?=  $this->session->flashdata('message');?> 
      </div>
  <?php endif;?>
   <?php if (!empty( $this->session->flashdata('message2'))):?>
      <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <?=  $this->session->flashdata('message2');?> 
      </div>
  <?php endif;?>
 <?php
  if (! empty ($isi)){
      echo $isi;
  }
  ?>

</div>

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->


</body>

<script src="<?= base_url('assets/');?>js/jquery.min.js"></script> 
<script src="<?= base_url('assets/');?>js/jquery.ui.custom.js"></script> 
<script src="<?= base_url('assets/');?>js/bootstrap.min.js"></script> 
<script src="<?= base_url('assets/');?>js/jquery.uniform.js"></script> 
<script src="<?= base_url('assets/');?>js/select2.min.js"></script> 
<script src="<?= base_url('assets/');?>js/jquery.dataTables.min.js"></script> 
<script src="<?= base_url('assets/');?>js/matrix.js"></script> 
<script src="<?= base_url('assets/');?>js/matrix.tables.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>

</html>
