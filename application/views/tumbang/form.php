<?php
    if(!empty($tumbang)){
        $data = array(
          "$tumbang->id_tumbang",
          "$tumbang->usia",
          "$tumbang->pertumbuhan",
          "$tumbang->perkembangan",
          "$tumbang->stimulasi"
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
                <form id="edit-profile" action="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/tumbang/input" method="POST" class="form-horizontal">
                  <fieldset>
                    <div class="control-group">                     
                      <label class="control-label" >Usia</label>
                      <div class="controls">
                        <input type="hidden" class="span11" name="id_tumbang" value="<?= $data[0]; ?>">
                        <input type="number" class="span11" name="usia"  value="<?= $data[1]; ?>" >
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" >Pertumbuhan</label>
                      <div class="controls">
                        <textarea name="pertumbuhan" class="span11"><?= $data[2]; ?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      
                    <div class="control-group">                     
                      <label class="control-label" >Perkembangan</label>
                      <div class="controls">
                        <textarea class="span11" name="perkembangan"><?= $data[3]; ?></textarea>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                      <div class="control-group">                     
                      <label class="control-label" >Stimulasi</label>
                      <div class="controls">
                        <textarea class="span11" name="stimulasi"><?= $data[4]; ?></textarea> 
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
  