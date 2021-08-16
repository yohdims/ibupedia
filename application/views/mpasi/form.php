<?php
    if(!empty($mpasi)){
        $data = array(
          "$mpasi->id_mpasi",
          "$mpasi->nama_mpasi",
          "$mpasi->deskripsi",
          "$mpasi->bulan",
        );
    }else{
        $data = array("","","","","","","","");
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
                <form id="edit-profile" action="<?= base_url($this->session->userdata('hak_akses'))?>/mpasi/input" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <fieldset>
                     <div class="control-group">                     
                      <label class="control-label" >Nama mpasi</label>
                      <div class="controls">
                        <input type="hidden" class="span6" id="id_mpasi" name="id_mpasi" value="<?= $data[0]; ?>">
                        <input type="text" class="span6" name="nama_mpasi" placeholder="nama_mpasi" value="<?= $data[1]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    <div class="control-group">                     
                      <label class="control-label" >Deskripsi</label>
                      <div class="controls">
                        <textarea name="deskripsi" class="span6" required><?= $data[2]; ?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" >Bulan</label>
                      <div class="controls">
                        <input type="number" class="span6" name="bulan" placeholder="Bulan" value="<?= $data[3]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->


                    <div class="control-group">                     
                      <label class="control-label" >Gambar</label>
                      <div class="controls">
                        <input type="file" class="span6" name="gambar" placeholder="Gambar">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      
                   
                      
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save</button> 
                      <a href="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/mpasi/" class="btn" >Cancel</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                </form>
              
              
            </div>
            
            
            
            
            
          </div> <!-- /widget-content -->
            
        </div> <!-- /widget -->
            
        </div> <!-- /span8 -->
          
          
          
          
        </div> <!-- /row -->
  