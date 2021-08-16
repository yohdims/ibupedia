 <?php 
  $head = array("#","Nama Vaksin","Deskripsi","Bulan","Tahun","Action");
  $no=0;
 ?>
<div class="container-fluid">
    <hr>
    
    <div class="quick-actions_homepage">
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <a href="<?= base_url($this->session->userdata('hak_akses'))?>/vaksin/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i> Tambah</a>
  </div>
   <div class="widget-content nopadding" style="min-height: 400px">

        <table class="table table-striped table-bordered data-table">
      <thead>
        <tr>
          <?php foreach ( $head as $data) : ?>
          <th> <?= $data; ?></th>
          <?php endforeach ?>
        </tr>
      </thead>  
      <tbody>
        <?php foreach ( $vaksin as $data) : $no++;?>
        <tr>
          <td> <?= $no; ?></td>
          <td> <?= $data["nama_vaksin"]; ?></td>
          <td> <?= $data["deskripsi"]; ?></td>
          <td> <?= $data["bulan"]; ?></td>
          <td> <?= $data["tahun"]; ?></td>
          <td class="td-actions">
            <a href="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/vaksin/form/<?= $data['id_vaksin']; ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-eye-open"> </i>Edit</a>
            <a href="<?= base_url()?><?= $this->session->userdata('hak_akses')?>/vaksin/hapus/<?= $data["id_vaksin"]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i> Hapus</a>
          </td>
        </tr>
        <?php endforeach ?>      
      </tbody>
    </table>
  </div>
  <!-- /widget-content --> 
</div>
</div>
</div>