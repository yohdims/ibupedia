<?php
    if(!empty($vaksin)){
        $data = array(
          "$vaksin->id_vaksin",
          "$vaksin->nama_vaksin",
          "$vaksin->deskripsi",
          "$vaksin->bulan",
          "$vaksin->tahun"
        );
    }else{
        $data = array("","","","","","","","","","","","");
    }
?>
       <div class="container-fluid">
    <hr>
  <div class="row-fluid">
    <div class="span8">
    <div class="widget-box ">
      <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
        <h5><?= $title; ?></h5>
      </div>
      <div class="widget-content nopadding" >
                 <form id="edit-profile" action="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/vaksin/input" method="POST" class="form-horizontal"> 
                <!-- <form id="edit-profile" action="<?= base_url()?>admin/vaksin/insert" method="POST" class="form-horizontal"> -->
                  <fieldset>
                    <div class="control-group">                     
                      <label class="control-label" >Nama Vaksin</label>
                      <div class="controls">
                        <input type="hidden" class="span8" name="id_vaksin" value="<?= $data[0]; ?>">
                        <input type="text" class="span8" name="nama_vaksin"  value="<?= $data[1]; ?>" >
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" >Deskripsi</label>
                      <div class="controls">
                        <textarea name="deskripsi" class="span8"><?= $data[2]; ?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      
                    <div class="control-group">                     
                      <label class="control-label" >Bulan</label>
                      <div class="controls">
                        <input type="number" class="span8" name="bulan"  value="<?= $data[3]; ?>" >
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" >Tahun</label>
                      <div class="controls">
                        <input type="number" class="span8" name="tahun"  value="<?= $data[4]; ?>" > 
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->


                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save</button> 
                      <a href="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/pendaftaran/" class="btn" >Cancel</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                </form>
              
              
            </div>
            
            
            
            
            
          </div> <!-- /widget-content -->
            
        </div> <!-- /widget -->
            
        </div> <!-- /span8 -->
          
          
          
          
        </div> <!-- /row -->
  