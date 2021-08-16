<?php
    if(!empty($pengguna)){
        $data = array(
          "$pengguna->id_pengguna",
          "$pengguna->nama",
          "$pengguna->jk",
          "$pengguna->username",
          "$pengguna->password",
          "$pengguna->no_hp");
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
                <form id="edit-profile" action="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/pengguna/input" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <fieldset>
                    <div class="control-group">                     
                      <label class="control-label" >Nama</label>
                      <div class="controls">
                        <input type="hidden" class="span6" id="id_pengguna" name="id_pengguna" value="<?= $data[0]; ?>">
                        <input type="text" class="span6" name="nama" placeholder="Nama" value="<?= $data[1]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label">Jenis Kelamin</label>
                      <div class="controls">
                        <select name="jk">
                          <?php 
                          // $jk=array("L"=>"Laki-laki","P"=>"Perempuan");
                          $jk=array("Laki-laki","Perempuan");
                          foreach ( $jk as $data2 =>$value) : ?>
                            <option value="<?= $value;?>" <?php if($value==$data[2]){echo "selected"; }?>><?= $value;?></option>
                            <?php endforeach ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">                     
                      <label class="control-label" >Username</label>
                      <div class="controls">
                        <input type="text" class="span6" name="username" placeholder="username" value="<?= $data[3]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    
                    
                    <div class="control-group">                     
                      <label class="control-label" >Password</label>
                      <div class="controls">
                        <input type="password" class="span6" name="password" placeholder="Password" value="<?= $data[4]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label">No HP</label>
                      <div class="controls">
                        
                        <input type="text" class="span6" name="no_hp" placeholder="No HP" value="<?= $data[5]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      
                      
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save</button> 
                      <a href="<?= base_url()?>admin/user/" class="btn" >Cancel</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                </form>
              </div>
              
            </div>
            
            
            
            
            
          </div> <!-- /widget-content -->
            
        </div> <!-- /widget -->
            
        </div> <!-- /span8 -->
          
          
          
          
        </div> <!-- /row -->
  