<?php
    if(!empty($admin)){
        $data = array("$admin->id_admin","$admin->username","$admin->password");
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
                <form id="edit-profile" action="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/admin/input" method="POST" class="form-horizontal">
                  <fieldset>
                    
                    <div class="control-group">                     
                      <label class="control-label" >Username</label>
                      <div class="controls">
                        <input type="hidden" class="span6" id="id_admin" name="id_admin" value="<?= $data[0]; ?>">
                        <input type="text" class="span6" name="username" placeholder="username" value="<?= $data[1]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    <div class="control-group">                     
                      <label class="control-label" >Password</label>
                      <div class="controls">
                        <input type="password" class="span6" name="password" placeholder="password" value="<?= $data[2]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save</button> 
                        <a href="<?= base_url()?>admin/admin/" class="btn" >Cancel</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                </form>
              
              
            </div>
            
            
            
            
            
          </div> <!-- /widget-content -->
            
        </div> <!-- /widget -->
            
        </div> <!-- /span8 -->
          
          
          
          
        </div> <!-- /row -->
  