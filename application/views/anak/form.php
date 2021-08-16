<?php
    if(!empty($anak)){
        $data = array("$anak->id_anak","$anak->nama_anak","$anak->id_vaksin","$anak->tgl_lahir","$anak->berat_badan","$anak->tinggi_badan","$anak->jk","$anak->id_pengguna");
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
                <form id="edit-profile" action="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/anak/input" method="POST" class="form-horizontal">
                <!-- <form id="edit-profile" action="<?= base_url()?>api/insert_anak" method="POST" class="form-horizontal"> -->
                  <fieldset>
                    <div class="control-group">                     
                      <label class="control-label" >Pengguna</label>
                      <div class="controls">
                        <select name="id_pengguna">
                          <?php 
                          foreach ( $pengguna as $data2) : ?>
                            <option value="<?= $data2['id_pengguna'];?>" <?php if($data2['id_pengguna']==$data[6]){echo "selected"; }?>><?= $data2['nama'];?></option>
                            <?php endforeach ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                    <div class="control-group">                     
                      <label class="control-label" >Nama Anak</label>
                      <div class="controls">
                        <input type="hidden" class="span6" id="id_anak" name="id_anak" value="<?= $data[0]; ?>">
                        <input type="text" class="span6" name="nama_anak" placeholder="Nama Anak" value="<?= $data[1]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" >Vaksin</label>
                      <div class="controls">
                        <select name="id_vaksin">
                          <?php 
                          foreach ( $vaksin as $data2) : ?>
                            <option value="<?= $data2['id_vaksin'];?>" <?php if($data2['id_vaksin']==$data[2]){echo "selected"; }?>><?= $data2['nama_vaksin'];?></option>
                            <?php endforeach ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->


                    <div class="control-group">                     
                      <label class="control-label" >Tanggal Lahir</label>
                      <div class="controls">
                        <input type="date" class="span6" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $data[3]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->

                    <div class="control-group">                     
                      <label class="control-label" >Berat Badan</label>
                      <div class="controls">
                        <input type="number" class="span6" name="berat_badan" placeholder="Berat Badan" value="<?= $data[4]; ?>" required>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->
                      

                    <div class="control-group">                     
                      <label class="control-label" >Tinggi Badan</label>
                      <div class="controls">
                        <input type="number" class="span6" name="tinggi_badan" placeholder="Tinggi Badan" value="<?= $data[5]; ?>" required>
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
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save</button> 
                        <a href="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/anak/" class="btn" >Cancel</a>
                    </div> <!-- /form-actions -->
                  </fieldset>
                </form>
              
              
            </div>
            
            
            
            
            
          </div> <!-- /widget-content -->
            
        </div> <!-- /widget -->
            
        </div> <!-- /span8 -->
          
          
          
          
        </div> <!-- /row -->
  